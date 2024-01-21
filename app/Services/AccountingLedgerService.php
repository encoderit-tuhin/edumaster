<?php

declare(strict_types=1);

namespace App\Services;

use App\AccountingLedger;
use App\Repositories\AccountingLedgerRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AccountingLedgerService
{
    public function __construct(
        private readonly AccountingLedgerRepository $accountingLedgerRepository
    ) {
    }

    public function getAccountingLedgers(array $filter = []): LengthAwarePaginator
    {
        return $this->accountingLedgerRepository->paginate(100, $filter);
    }

    public function findAccountingLedgerById(int $id): ?AccountingLedger
    {
        return $this->accountingLedgerRepository->show($id);
    }

    public function createAccountingLedger(array $data): ?AccountingLedger
    {
        return $this->accountingLedgerRepository->create($data);
    }

    public function updateAccountingLedger(array $data, int $id)
    {
        return $this->accountingLedgerRepository->update($data, $id);
    }

    public function deleteAccountingLedgerById(int $id)
    {
        return $this->accountingLedgerRepository->delete($id);
    }
}
