<?php

namespace App\Http\Controllers;

use App\Fee;
use App\Services\FeeService;
use Illuminate\Http\Request;
use App\Http\Requests\FeesCreateRequest;

class FeesController extends Controller
{
    public function __construct(private readonly FeeService $feeService)
    {
    }

    public function index()
    {
        //    
    }

    public function store(FeesCreateRequest $request)
    {
        $fee_head = $this->feeService->createFee($request->validated());

        if (!$fee_head) {
            return redirect('amount-config')->with('error', _lang('Something went wrong. Fee can not be submitted.'));
        }

        return redirect('amount-config')->with('success', _lang('Fee has been submitted.'));
    }

    public function destroy($id)
    {
        $fee = Fee::where('id', $id)->first();

        if(!empty($fee))
        {
            $fee->delete();
            return redirect('amount-config')->with('success', _lang('Successfully Amount Config Deleted.'));
        }else{
            return redirect('amount-config')->with('error', _lang('Something went wrong.'));
        }
    }
}
