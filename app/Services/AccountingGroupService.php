<?php

declare(strict_types=1);

namespace App\Services;

use App\AccountingGroup;
use App\Repositories\AccountingGroupRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AccountingGroupService
{
    public function __construct(
        private readonly AccountingGroupRepository $accountingGroupRepository
    ) {
    }

    public function getAccountingGroups(array $filter = []): LengthAwarePaginator
    {
        return $this->accountingGroupRepository->paginate(20, $filter);
    }

    public function findAccountingGroupById(int $id): ?AccountingGroup
    {
        return $this->accountingGroupRepository->show($id);
    }

    public function createAccountingGroup(array $data): ?AccountingGroup
    {
        return $this->accountingGroupRepository->create($data);
    }

    public function updateAccountingGroup(array $data, int $id)
    {
        return $this->accountingGroupRepository->update($data, $id);
    }

    public function deleteAccountingGroupById(int $id)
    {
        return $this->accountingGroupRepository->delete($id);
    }
}
