<?php

namespace App\Http\Controllers;

use App\FeeMap;
use Illuminate\Http\Request;
use App\Services\FeeWaiverService;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;

class PayslipCollectionController extends Controller
{
    public function __construct(private readonly FeeWaiverService $feeWaiverService)
    {
    }

    public function index(): View|Factory
    {
        return view('backend.payslip_collection.index');
    }

    public function store(Request $request)
    {
        $feeMap = FeeMap::where('fee_head_id', $request->fee_head_id)->where('type', 'fee')->first();

        if ($feeMap) {
            $feeMapFeeSubHeads = DB::table('fee_map_fee_sub_head')
                ->join('fee_sub_heads', 'fee_map_fee_sub_head.fee_sub_head_id', 'fee_sub_heads.id')
                ->select('fee_map_fee_sub_head.*', 'fee_sub_heads.*')
                ->orderBy('fee_sub_heads.serial', 'asc')
                ->where('fee_map_id', $feeMap->id)
                ->get();

            return view('backend.payslip_collection.index', ['feeMap' => $feeMap, 'feeMapFeeSubHeads' => $feeMapFeeSubHeads]);
        } else {
            return back()->with('error', 'FeeMap not found for the provided ID');
        }
    }
}
