<?php

declare(strict_types=1);

namespace App\Services;

use App\BankAccount;
use App\Repositories\BankAccountRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BankAccountService
{
    public function __construct(
        private readonly BankAccountRepository $bankAccountRepository
    ) {
    }

    public function getBankAccounts(array $filter = []): LengthAwarePaginator
    {
        return $this->bankAccountRepository->paginate(20, $filter);
    }

    public function findBankAccountById(int $id): ?BankAccount
    {
        return $this->bankAccountRepository->show($id);
    }

    public function createBankAccount(array $data): ?BankAccount
    {
        return $this->bankAccountRepository->create($data);
    }

    public function updateBankAccount(array $data, int $id)
    {
        return $this->bankAccountRepository->update($data, $id);
    }

    public function deleteBankAccountById(int $id)
    {
        return $this->bankAccountRepository->delete($id);
    }
}
