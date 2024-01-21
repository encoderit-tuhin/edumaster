<?php

declare(strict_types=1);

namespace App\Services;

use App\AccountingFund;
use App\Repositories\AccountingFundRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AccountingFundService
{
    public function __construct(
        private readonly AccountingFundRepository $accountingFundRepository
    ) {
    }

    public function getAccountingFunds(array $filter = []): LengthAwarePaginator
    {
        return $this->accountingFundRepository->paginate(20, $filter);
    }

    public function findAccountingFundById(int $id): ?AccountingFund
    {
        return $this->accountingFundRepository->show($id);
    }

    public function createAccountingFund(array $data): ?AccountingFund
    {
        return $this->accountingFundRepository->create($data);
    }

    public function updateAccountingFund(array $data, int $id)
    {
        return $this->accountingFundRepository->update($data, $id);
    }

    public function deleteAccountingFundById(int $id)
    {
        return $this->accountingFundRepository->delete($id);
    }
}
