<?php

namespace App\Http\Controllers;

use App\AbsentFine;
use Illuminate\Http\Request;
use App\Services\AbsentFineService;

class AbsentFineController extends Controller
{
    public function __construct(private readonly AbsentFineService $absentFineService)
    {
    }

    public function index()
    {
        //    
    }

    public function store(Request $request)
    {

        $classIds = $request->class_ids;
        $periodIds = $request->period_ids;

        foreach ($classIds as $classId) {
            foreach ($periodIds as $periodId) {

                $data = [
                    'class_id' => $classId,
                    'period_id' => $periodId,
                    'fee_amount' => $request->amount,
                ];

                $fee_head = $this->absentFineService->createAbsentFine($data);
            }
        }

        if (!$fee_head) {
            return redirect('amount-config')->with('error', _lang('Something went wrong. Absent Fine can not be submitted.'));
        }

        return redirect('amount-config')->with('success', _lang('Absent Fine has been submitted.'));
    }

    public function destroy($id)
    {
        $absentFine = AbsentFine::where('id', $id)->first();

        if(!empty($absentFine))
        {
            $absentFine->delete();
            return redirect('amount-config')->with('success', _lang('Successfully Absent Fine Deleted.'));
        }else{
            return redirect('amount-config')->with('error', _lang('Something went wrong.'));
        }
    }
}
