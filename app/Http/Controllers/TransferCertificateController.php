<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\StudentService;
use App\StudentOnlineRegistration;
use Illuminate\Support\Facades\DB;
use App\Services\TransferCertificateService;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\TransferCertificateRequest;

class TransferCertificateController extends Controller
{
    public function __construct(
        private readonly TransferCertificateService $transferCertificateService,
        private readonly UserService $userService,
        private readonly StudentService $studentService,
    ) {
    }

    public function index()
    {
        return view('backend.tc.index', [
            'tcs' => $this->transferCertificateService->getTCs(),
        ]);
    }


    public function create()
    {
        return view('backend.tc.create');
    }


    public function store(TransferCertificateRequest $request)
    {
        try {
            DB::beginTransaction();

            $tcInfo = $this->transferCertificateService->create($request->validated());

            if ($tcInfo) {
                $student = $this->studentService->findStudentById((int) $tcInfo->student_id);

                if ($student) {
                    $student->status = '0';
                    $student->save();

                    $user = $this->userService->findUserById($student->user_id);
                    $user->user_status = '0';
                    $user->save();
                }

                DB::commit();

                return redirect()->route('tc.index')
                    ->with('success', 'TCs created successfully.');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            throw new ValidationException(
                $request,
                ['An error occurred while processing your request. Please try again.']
            );
        }
    }

    public function show($id)
    {
        $TCs = $this->transferCertificateService->findTCsById($id);
        if (!$TCs) {
            abort(404);
        }
        return view('backend.tc.show', compact('TCs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tcs = $this->transferCertificateService->findTCsById($id);
        if (!$tcs) {
            abort(404);
        }
        return view('backend.tc.edit', compact('tcs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TransferCertificateRequest $request, $id)
    {
        // dd($request);
        $tc = $this->transferCertificateService->findTCsById($id);
        if (!$tc) {
            abort(404);
        }
        $this->transferCertificateService->updateTCs($request->validated(), $id);
        // $tc->update($request->validated());
        return redirect()->route('tc.index')
            ->with('success', 'TCs Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $TCs = $this->transferCertificateService->findTCsById($id);
        if (!$TCs) {
            abort(404);
        }
        $this->transferCertificateService->deleteTCsById($id);

        return redirect()->route('tc.index')
            ->with('success', 'TCs deleted successfully');
    }


    public function studentSearch(Request $request)
    {
        if ($request->ajax()) {
            $student = StudentOnlineRegistration::where('roll', $request->roll)
                ->with('studentGroup')->first();

            return view('backend.tc.search-student', compact('student'));
        }
    }
    public function tcPdf($id)
    {
        $tc = $this->transferCertificateService->findTCsById($id);
        // dd($tc->student);
        $student = StudentOnlineRegistration::where('roll', $tc->student->studentSession->roll)->with('class')->first();
        if (!$tc || !$student) {
            abort(404);
        }
        // dd($student);
        return view('backend.tc.tc-format', compact('tc', 'student'));
        // $data = [
        //     'tc' => $tc,
        // ];
        // $pdf = PDF::loadView('backend.tc.tc-format', $data);
        // return $pdf->download($tc->student->first_name . '-' . $tc->student->id . '.pdf');
    }
}
