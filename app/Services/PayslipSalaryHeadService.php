<?php

declare(strict_types=1);

namespace App\Services;

use App\PayslipSalaryHead;
use App\Repositories\PayslipSalaryHeadRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PayslipSalaryHeadService
{
    public function __construct(
        private readonly PayslipSalaryHeadRepository $payslipSalaryHeadRepository
    ) {
    }

    public function getPayslipSalaryHeads(array $filter = []): LengthAwarePaginator
    {
        return $this->payslipSalaryHeadRepository->paginate(20, $filter);
    }

    public function findPayslipSalaryHeadById(int $id): ?PayslipSalaryHead
    {
        return $this->payslipSalaryHeadRepository->show($id);
    }

    public function createPayslipSalaryHead(array $data): ?PayslipSalaryHead
    {
        return $this->payslipSalaryHeadRepository->create($data);
    }

    public function updatePayslipSalaryHead(array $data, int $id)
    {
        return $this->payslipSalaryHeadRepository->update($data, $id);
    }

    public function deletePayslipSalaryHeadById(int $id)
    {
        return $this->payslipSalaryHeadRepository->delete($id);
    }
}
