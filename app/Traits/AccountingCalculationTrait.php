<?php

namespace App\Traits;

use App\AccountingFund;
use App\AccountingLedger;
use App\Enums\VoucherType;
use App\AccountTransaction;
use App\AccountTransactionDetail;
use Illuminate\Support\Facades\DB;
use App\Exceptions\AccountingTransactionException;

trait AccountingCalculationTrait
{
    public function getAccountingTransactionSummaryByDate($filter = [])
    {
        $startDate = $filter['start_date'] ?? date('Y-m-d');
        $endDate = $filter['end_date'] ?? date('Y-m-d');

        $query = AccountTransactionDetail::select([
            'account_transaction_details.ledger_id',
            'accounting_ledgers.ledger_name',
            DB::raw('SUM(account_transaction_details.debit) AS total_debit'),
            DB::raw('SUM(account_transaction_details.credit) AS total_credit')
        ])
            ->join('accounting_ledgers', 'account_transaction_details.ledger_id', '=', 'accounting_ledgers.id')
            ->whereBetween('account_transaction_details.transaction_date', [$startDate, $endDate])
            ->groupBy('account_transaction_details.ledger_id', 'accounting_ledgers.ledger_name');

        return $query->get();
    }

    public function getAccountingOpeningBalance($date)
    {
        $startDate = '2023-01-01';
        $endDate = $date;

        $summary = $this->getAccountingTransactionSummaryByDate([
            'start_date' => $startDate,
            'end_date' => $endDate
        ]);

        $openingBalance = 0;
        foreach ($summary as $value) {
            $openingBalance += $value->total_debit - $value->total_credit;
        }

        return $openingBalance;
    }

    public function createAccountingTransaction($data)
    {
        try {
            DB::beginTransaction();

            $transaction = $this->createAccountTransaction($data);

            $amount = 0;
            foreach ($data['details'] as $detail) {
                $this->createAccountTransactionDetail($transaction->id, $detail);
                $amount += $detail['debit'] - $detail['credit'];
            }

            $fund = AccountingFund::where('id', $data['fund_id'] ?? null)->first();
            if ($fund) {
                $newBalance = $data['type'] === VoucherType::PAYMENT
                    ? $fund->balance - $amount
                    : $fund->balance + $amount;

                $fund->balance = $newBalance;
                $fund->save();
            }

            $ledgerAccount = AccountingLedger::where('id', $data['ledger_id'] ?? null)->first();
            if ($ledgerAccount) {
                $newBalance = $data['type'] === VoucherType::PAYMENT
                    ? $ledgerAccount->balance - $amount
                    : $ledgerAccount->balance + $amount;
                $ledgerAccount->balance = $newBalance;
                $ledgerAccount->save();
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function generateVoucherId()
    {
        // Generate a 16 digit random number.
        // Also check if the voucher id is already exists in the database.
        do {
            $voucherId = mt_rand(1000000000000000, 9999999999999999);
            $voucher = AccountTransaction::where('voucher_id', $voucherId)->first();
        } while (!empty($voucher));

        return $voucherId;
    }

    public function createAccountTransaction($data)
    {
        // Check if type is in the getAccountingTypes() array.
        if (!array_key_exists($data['type'], get_accounting_types())) {
            throw new AccountingTransactionException('Invalid transaction type.');
        }

        $transaction = new AccountTransaction();
        $transaction->category_id = (int) $data['category_id'];
        $transaction->type = $data['type'];
        $transaction->transaction_date = $data['transaction_date'];

        $transaction->voucher_id = $data['voucher_id'] ?? $this->generateVoucherId();
        $transaction->fund_id = $data['fund_id'] ?? null;
        $transaction->fund_to_id = $data['fund_to_id'] ?? null;
        $transaction->payment_method_id = $data['payment_method_id'] ?? null; // TODO: this is ledger_id.
        $transaction->payment_method_to_id = $data['payment_method_to_id'] ?? null; // TODO: this is ledger_id.
        $transaction->reference = $data['reference'] ?? null;
        $transaction->description = $data['description'] ?? null;
        $transaction->created_by = auth()->user()->id;
        $transaction->save();

        return $transaction;
    }

    public function createAccountTransactionDetail($transactionId, $data)
    {
        $detail = new AccountTransactionDetail();
        $detail->account_transactions_id = $transactionId;
        $detail->fund_id = $data['fund_id'] ?? null;
        $detail->fund_to_id = $data['fund_to_id'] ?? null;
        $detail->ledger_id = $data['ledger_id'] ?? null;
        $detail->payment_method_id = $data['payment_method_id'] ?? null;
        $detail->payment_method_to_id = $data['payment_method_to_id'] ?? null;
        $detail->debit = $data['debit'] ?? 0;
        $detail->credit = $data['credit'] ?? 0;
        $detail->save();

        return $detail;
    }
}
