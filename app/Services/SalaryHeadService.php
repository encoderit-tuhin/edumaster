<?php

declare(strict_types=1);

namespace App\Services;

use App\SalaryHead;
use App\UserPayroll;
use App\SalaryHeadUserPayroll;
use Illuminate\Support\Facades\DB;
use App\Repositories\SalaryHeadRepository;
use App\Repositories\UserPayrollRepository;
use App\Repositories\SalaryHeadUserPayrollRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class SalaryHeadService
{
    public function __construct(
        private readonly SalaryHeadRepository $salaryHeadRepository,
        private readonly SalaryHeadUserPayrollRepository $salaryHeadUserPayrollRepository,
        private readonly UserPayrollRepository $userPayrollRepository,

    ) {
    }

    public function getSalaryHeads(array $filter = []): LengthAwarePaginator
    {
        return $this->salaryHeadRepository->paginate(20, $filter);
    }

    public function findSalaryHeadById(int $id): ?SalaryHead
    {
        return $this->salaryHeadRepository->show($id);
    }

    public function createSalaryHead(array $data): ?SalaryHead
    {
        return $this->salaryHeadRepository->create($data);
    }

    public function updateSalaryHead(array $data, int $id)
    {
        return $this->salaryHeadRepository->update($data, $id);
    }

    public function deleteSalaryHeadById(int $id)
    {
        return $this->salaryHeadRepository->delete($id);
    }

    public function findSalaryHeadUserPayrollById(int $id): ?SalaryHeadUserPayroll
    {
        return $this->salaryHeadUserPayrollRepository->show($id);
    }

    public function findUserPayrollById(int $id): ?UserPayroll
    {
        return $this->userPayrollRepository->show($id);
    }

    public function getSalaryHeadUserPayrollsForUsers(array $userIds)
    {
        return DB::table('salary_head_user_payrolls')
            ->whereIn('user_payroll_id', $userIds)
            ->get()
            ->toArray();
    }

    public function updatePayrolls($requestData)
    {
        DB::beginTransaction();
        try {
            foreach ($requestData['payroll_heads'] as $id => $salaryHeads) {
                $totalAdditionNetSalary = 0;
                $totalDeductionNetSalary = 0;
                $totalNetSalary = 0;

                foreach ($salaryHeads as $salaryHeadId => $salaryHeadAmount) {
                    $salaryHeadUserPayroll = $this->findSalaryHeadUserPayrollById($salaryHeadId);
                    $salaryHeadUserPayroll->amount = $salaryHeadAmount;
                    $salaryHead = $this->findSalaryHeadById($salaryHeadUserPayroll->salary_head_id);

                    if ($salaryHead->type == 'Addition') {
                        $totalAdditionNetSalary += $salaryHeadAmount;
                    }

                    if ($salaryHead->type == 'Deduction') {
                        $totalDeductionNetSalary += $salaryHeadAmount;
                    }

                    $salaryHeadUserPayroll->save();
                }

                $totalNetSalary = $totalAdditionNetSalary - $totalDeductionNetSalary;
                $userPayroll = $this->findUserPayrollById($id);
                $userPayroll->net_salary = $totalNetSalary;
                $userPayroll->save();
            }

            DB::commit();
            return ['success' => true, 'message' => 'User Payroll updated.'];
        } catch (\Exception $e) {
            DB::rollback();
            return ['error' => true, 'message' => 'User Payroll update unsuccessful.'];
        }
    }
}
