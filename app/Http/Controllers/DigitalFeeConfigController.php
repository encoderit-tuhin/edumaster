<?php

namespace App\Http\Controllers;

use App\DigitalFeeConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DigitalFeeConfigController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        // 
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            DigitalFeeConfig::create([
                'bank_account_id' => $request->bank_account_id,
                'ledger_id' => $request->ledger_id
            ]);

            DB::commit();

            return redirect('fees-mapping')->with('success', _lang('Successfully created Digital Fee Config with related records.'));
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('fees-mapping')->with('error', _lang('Failed to create Digital Fee Config with related records. Please try again.'));
        }
    }

    public function destroy($id)
    {
        $digitalFeeConfig = DigitalFeeConfig::where('id', $id)->first();

        if(!empty($digitalFeeConfig))
        {
            $digitalFeeConfig->delete();
            return redirect('fees-mapping')->with('success', _lang('Successfully Digital Fee Config Deleted.'));
        }else{
            return redirect('fees-mapping')->with('error', _lang('Something went wrong.'));
        }
    }
}
