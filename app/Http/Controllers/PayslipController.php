<?php

namespace App\Http\Controllers;

use App\Exceptions\StudentCollectionException;
use App\Http\Requests\PayslipCreateRequest;
use App\StudentCollection;
use App\StudentCollectionDetails;
use App\StudentCollectionDetailsSubHead;
use App\StudentSession;
use App\Traits\StudentCollectionTrait;
use App\Traits\Trackable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PayslipController extends Controller
{
    use StudentCollectionTrait;
    use Trackable;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.payslip.create');
    }

    public function createForm()
    {
        $type = request()->input('type');

        return view('backend.payslip.partials.form', [
            'type' => $type,
        ]);
    }

    public function collection()
    {
        $type = request()->input('type') ?? 'single';
        $studentIds = [];

        if ($type === 'single') {
            $studentIds = [request()->input('student_id')];
        } elseif ($type === 'multiple' && request()->input('class_id')) {
            $query = StudentSession::where('session_id', get_option('academic_year'));
            if (request()->input('class_id')) {
                $query->where('class_id', request()->input('class_id'));
            }

            if (request()->input('section_id')) {
                $query->where('section_id', request()->input('section_id'));
            }

            $studentIds = $query->pluck('student_id')->toArray();
        }

        $collections = StudentCollection::whereIn('student_id', $studentIds)
            ->where('session_id', get_option('academic_year'))
            ->whereRaw('total_payable > total_paid')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('backend.payslip.collection', [
            'type' => $type,
            'collections' => $collections,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PayslipCreateRequest $request)
    {
        try {
            $studentIds = [];
            switch ($request->type) {
                case 'class':
                    $studentIds = StudentSession::where('class_id', $request->class_id)
                        ->where('session_id', get_option('academic_year'))
                        ->pluck('student_id')
                        ->toArray();
                    break;
                case 'section':
                    $studentIds = StudentSession::where('section_id', $request->section_id)
                        ->where('session_id', get_option('academic_year'))
                        ->pluck('student_id')
                        ->toArray();
                    break;
                case 'student':
                    $studentIds = [$request->student_id];
                    break;

                default:
                    $studentIds = [];
                    break;
            }

            if (empty($studentIds)) {
                throw new StudentCollectionException(__('No student found.'));
            }

            $studentIds = array_map(function ($studentId) {
                return (int) $studentId;
            }, $studentIds);

            $payslipDatas = $this->generateCollectionDataFromPayslip(
                $studentIds,
                $request->all(),
            );

            if (empty($payslipDatas)) {
                throw new StudentCollectionException(__('No Payslip data found.'));
            }

            $totalPayslip = 0;
            try {
                foreach ($payslipDatas as $payslipData) {
                    $studentCollection = $this->createCollection($payslipData);
                    if (!empty($studentCollection)) {
                        $totalPayslip++;
                    }
                }
            } catch (\Throwable $th) {
                $this->trackAction(
                    'create',
                    StudentCollection::class,
                    null,
                    'Payslip Create Error: ' . $th->getMessage()
                );
            }

            if ($totalPayslip === 0) {
                throw new StudentCollectionException(__('No Payslip created. Please try again.'));
            }

            return redirect()->back()->with(
                'success',
                __("Payslip created successfully for total $totalPayslip students.")
            );
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', __('Payslip could not be created. Error: ' . $th->getMessage()));
        }
    }

    /**
     * Collecttion Store
     */

    public function collectionUpdate(Request $request)
    {
        try {
            $type = request()->input('type') ?? 'single';

            if ($type === 'single') {
                $collectionDatas = $this->generateCollectionDataFormat(
                    $request->all(),
                );
                $this->updateCollection($collectionDatas);
            } elseif ($type === 'multiple') {
                DB::beginTransaction();
                $studentCollectionIds = $request->collection_ids ?? [];
                foreach ($studentCollectionIds as $studentCollectionId) {
                    $data = StudentCollection::findOrFail($studentCollectionId);
                    $submitData['invoice_date'] = $request->date;
                    $submitData['ledger_id'] = $request->ledger_id;
                    $submitData['id'] = $data->id;

                    $submitData['details'] = [
                        'total_paid' => $data->total_payable ?? 0,
                        'waiver' => $data->waiver ?? 0,
                        'fee_and_fine_payable' => $data->total_payable + $data->attendance_fine,
                        'fee_and_fine_paid' => $data->total_payable + $data->attendance_fine,
                        'total_payable' => $data->total_payable ?? 0,
                    ];

                    $submitData['total_due'] = 0;
                    $submitData['total_paid'] = $data->total_payable ?? 0;
                    $this->updateCollection($submitData);
                }
                DB::commit();
            }

            return redirect()->back()->with(
                'success',
                __('Payslip collection successfully updated.')
            );
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', __('Payslip collection could not be completed. ' . $th->getMessage()));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyList()
    {
        try {
            $invoiceId = request()->input('invoice_id');

            if (empty($invoiceId)) {
                return view('backend.payslip.collection-delete', [
                    'collection' => null,
                ]);
            }
            $collection = StudentCollection::where('invoice_id', $invoiceId)->first();

            if (empty($collection)) {
                throw new StudentCollectionException(__('Collection invoice could not found or already deleted.'));
            }

            return view('backend.payslip.collection-delete', [
                'collection' => $collection,
            ]);
        } catch (\Throwable $th) {
            return redirect()
                ->route('payslip.delete.list')
                ->with('error', __('Payslip collection could not be found. ' . $th->getMessage()));
        }
    }

    public function destroy($invoiceId)
    {
        $studentCollection = StudentCollection::where('invoice_id', $invoiceId)->first();
        if (empty($studentCollection)) {
            throw new StudentCollectionException(__('Collection invoice could not found or already deleted.'));
        }

        DB::table('student_collection_details')
            ->where('student_collection_id', $studentCollection->id)
            ->delete();

        DB::table('student_collection_details_sub_heads')
            ->where('student_collection_id', $studentCollection->id)
            ->delete();

        $studentCollection->delete();

        session()->flash('success', __('Collection invoice deleted successfully.'));
        return redirect()->route('payslip.delete.list');
    }
}
