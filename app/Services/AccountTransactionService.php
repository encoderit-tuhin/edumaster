<?php

declare(strict_types=1);

namespace App\Services;

use Carbon\Carbon;
use App\AccountTransaction;
use App\AccountTransactionDetail;
use App\PayrollAccountingMapping;
use Illuminate\Support\Facades\Auth;
use App\Repositories\AccountTransactionRepository;
use App\Repositories\AccountTransactionDetailRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AccountTransactionService
{
    public function __construct(
        private readonly AccountTransactionRepository $accountTransactionRepository,
        private readonly AccountTransactionDetailRepository $accountTransactionDetailRepository,
    ) {
    }

    public function getAccountTransactions(array $filter = []): LengthAwarePaginator
    {
        return $this->accountTransactionRepository->paginate(20, $filter);
    }

    public function findAccountTransactionById(int $id): ?AccountTransaction
    {
        return $this->accountTransactionRepository->show($id);
    }

    public function createAccountTransaction(array $data): ?AccountTransaction
    {
        return $this->accountTransactionRepository->create($data);
    }

    public function updateAccountTransaction(array $data, int $id)
    {
        return $this->accountTransactionRepository->update($data, $id);
    }

    public function deleteAccountTransactionById(int $id)
    {
        return $this->accountTransactionRepository->delete($id);
    }

    public function createAccountTransactionDetail(array $data): ?AccountTransactionDetail
    {
        return $this->accountTransactionDetailRepository->create($data);
    }

    public function prepareForAccTransAndDetails(array $data, $amount_type, $type = null)
    {
        $ledger_fund = PayrollAccountingMapping::first();
        $transactionData = [
            'voucher_id' => (int) sprintf('%016d', rand(0, 9999999999999999)),
            'category_id' => 1,
            'fund_id' => $ledger_fund->fund_id,
            'transaction_date' => now(),
            'type' => !is_null($type) ? $type : 'payment',
            'fund_to_id' => $data['user_id'],
            'created_by' => Auth::id(),
            $amount_type => $data['amount']
        ];

        $transaction = $this->createAccountTransaction($transactionData);
        if (!empty($transaction)) {
            $transactionData['account_transactions_id'] = $transaction->id;
            $transactionData['ledger_id'] = $ledger_fund->ledger_id;
            $transactionData['transaction_date'] = $transaction->transaction_date;
            $this->createAccountTransactionDetail($transactionData);
        }
    }
}
