<?php

namespace App\Http\Controllers;

use App\FeeMap;
use App\AccountingLedger;
use App\DigitalFeeConfig;
use Illuminate\Http\Request;
use App\Services\FeeHeadService;
use App\Services\FeeWaiverService;
use Illuminate\Support\Facades\DB;
use App\Services\FeeSubHeadService;
use Illuminate\Contracts\View\View;
use App\Services\BankAccountService;
use Illuminate\Contracts\View\Factory;
use App\Services\AccountingLedgerService;

class FeesMappingController extends Controller
{
    public function __construct(
        private readonly FeeHeadService $feeHeadService,
        private readonly FeeSubHeadService $feeSubHeadService,
        private readonly FeeWaiverService $feeWaiverService,
        private readonly BankAccountService $bankAccountService,
        private readonly AccountingLedgerService $accountingLedgerService
    ) {
    }

    public function index(): View|Factory
    {
        return view('backend.fees_mapping.index', [
            'fee_mapping' => FeeMap::where('type', 'fee')->latest()->get(),
            'fee_fine_mapping' => FeeMap::where('type', 'fee_fine')->latest()->get(),
            'bank_accounts' => $this->bankAccountService->getBankAccounts(),
            'accountingLedgers' => AccountingLedger::where("type", 'payment')->get(),
            'digitalFeeConfigs' => DigitalFeeConfig::get(),
        ]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $feeMap = FeeMap::create([
                'fee_head_id' => $request->fee_head_id,
                'fee_sub_head_id' => $request->fee_sub_head_id,
                'ledger_id' => $request->ledger_id,
                'type' => $request->type ?? 'fee',
            ]);

            $feeSubHeadIds = $request->fee_sub_head_ids;
            $feeHeadId = $request->fee_head_id;

            if ($request->type === 'fee') {
                $attachArray = array_map(function($subHeadId) use ($feeHeadId) {
                    return [
                        'fee_head_id' => $feeHeadId,
                        'fee_sub_head_id' => $subHeadId,
                    ];
                }, $feeSubHeadIds);
                $feeMap->feeSubHeads()->attach($attachArray);
            } elseif ($request->type === 'fee_fine') {
                $feeMap->funds()->attach($request->fund_id);
            }

            $feeMap->funds()->attach($request->fund_ids);

            DB::commit();

            return redirect('fees-mapping')->with('success', _lang('Successfully created FeeMap with related records.'));
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('fees-mapping')->with('error', _lang('Failed to create FeeMap with related records. Please try again.'));
        }
    }

    public function destroy($id)
    {
        $feemap = FeeMap::where('id', $id)->first();

        if(!empty($feemap))
        {
            $feemap->delete();
            return redirect('fees-mapping')->with('success', _lang('Successfully FeeMap Deleted.'));
        }else{
            return redirect('fees-mapping')->with('error', _lang('Something went wrong.'));
        }
    }
}
