<?php

declare(strict_types=1);

namespace App\Services;

use App\AccountingCategory;
use App\AccountingType;
use App\Repositories\AccountingCategoryRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AccountingCategoryService
{
    public function __construct(
        private readonly AccountingCategoryRepository $accountingCategoryRepository
    ) {
    }

    public function getAccountingCategories(array $filter = []): LengthAwarePaginator
    {
        return $this->accountingCategoryRepository->paginate(20, $filter);
    }

    public function findAccountingCategoryById(int $id): ?AccountingCategory
    {
        return $this->accountingCategoryRepository->show($id);
    }

    public function createAccountingCategory(array $data): ?AccountingCategory
    {
        // Append nature to data
        $data['nature'] = AccountingType::getAccountingNatureByType($data['type']);
        return $this->accountingCategoryRepository->create($data);
    }

    public function updateAccountingCategory(array $data, int $id)
    {
        return $this->accountingCategoryRepository->update($data, $id);
    }

    public function deleteAccountingCategoryById(int $id)
    {
        return $this->accountingCategoryRepository->delete($id);
    }
}
