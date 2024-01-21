<?php

namespace App\Http\Controllers;

use App\FeeDateConfig;
use Illuminate\Http\Request;
use App\Services\FeeWaiverService;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;

class FeeDateConfigController extends Controller
{
    public function __construct(private readonly FeeWaiverService $feeWaiverService)
    {
    }

    public function index(): View|Factory
    {
        return view('backend.date_config.index');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $dataCount = count($request->payable_date);
            for ($i = 0; $i < $dataCount; $i++) {
                $feeDateConfig = new FeeDateConfig();

                $feeDateConfig->fee_sub_head_id = $request->fee_sub_head_id[$i];
                $feeDateConfig->payable_date_start = $request->payable_date[$i];
                $feeDateConfig->payable_date_end = $request->fine_active_date[$i];

                $feeDateConfig->save();
            }

            DB::commit();
            return redirect('date-config')->with('success', _lang('Successfully created Fee Date config with related records.'));
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('date-config')->with('error', _lang('Failed to create Fee Date config with related records. Please try again.'));
        }
    }
}
