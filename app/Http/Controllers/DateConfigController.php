<?php

namespace App\Http\Controllers;

use App\FeeDateConfig;
use App\FeeMap;
use Illuminate\Http\Request;
use App\Services\FeeWaiverService;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;

class DateConfigController extends Controller
{
    public function __construct(private readonly FeeWaiverService $feeWaiverService)
    {
    }

    public function index(): View|Factory
    {
        return view('backend.date_config.index', [
            'fee_date_configs' => FeeDateConfig::join('fee_sub_heads', 'fee_date_configs.fee_sub_head_id', '=', 'fee_sub_heads.id')
            ->select('fee_date_configs.id', 'fee_date_configs.payable_date_start', 'fee_date_configs.payable_date_end', 'fee_sub_heads.name as fee_sub_head_name')
            ->orderBy('fee_date_configs.id', 'desc')
            ->get(),
        ]);
    }

    public function store(Request $request)
    {
        $feeMap = FeeMap::where('fee_head_id', $request->fee_head_id)->where('type', 'fee')->first();
        $fee_date_configs = FeeDateConfig::join('fee_sub_heads', 'fee_date_configs.fee_sub_head_id', '=', 'fee_sub_heads.id')
            ->select('fee_date_configs.id', 'fee_date_configs.payable_date_start', 'fee_date_configs.payable_date_end', 'fee_sub_heads.name as fee_sub_head_name')
            ->orderBy('fee_date_configs.id', 'desc')
            ->get();

        if ($feeMap) {
            $feeMapFeeSubHeads = DB::table('fee_map_fee_sub_head')
                ->join('fee_sub_heads', 'fee_map_fee_sub_head.fee_sub_head_id', 'fee_sub_heads.id')
                ->select('fee_map_fee_sub_head.*', 'fee_sub_heads.*')
                ->orderBy('fee_sub_heads.serial', 'asc')
                ->where('fee_map_id', $feeMap->id)
                ->get();

            return view('backend.date_config.index', ['feeMap' => $feeMap, 'feeMapFeeSubHeads' => $feeMapFeeSubHeads, 'fee_date_configs' => $fee_date_configs]);
        } else {
            return back()->with('error', 'FeeMap not found for the provided ID');
        }
    }

    public function destroy($id)
    {
        $feeDateConfig = FeeDateConfig::where('id', $id)->first();

        if(!empty($feeDateConfig))
        {
            $feeDateConfig->delete();
            return redirect('date-config')->with('success', _lang('Successfully Date Config Deleted.'));
        }else{
            return redirect('date-config')->with('error', _lang('Something went wrong.'));
        }
    }
}
