<?php

declare(strict_types=1);

namespace App\Services;

use App\UserPayroll;
use App\PayslipSalary;
use Illuminate\Support\Facades\DB;
use App\Services\PayslipInvoiceService;
use App\Services\PayslipSalaryHeadService;
use App\Repositories\UserPayrollRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserPayrollService
{
    public function __construct(
        private readonly UserPayrollRepository $userPayrollRepository,
        private readonly PayslipSalaryHeadService $payslipSalaryHeadService,
        private readonly PayslipInvoiceService $payslipInvoiceService,
    ) {
    }

    public function getUserPayrolls(array $filter = []): LengthAwarePaginator
    {
        return $this->userPayrollRepository->paginate(20, $filter);
    }

    public function findUserPayrollById(int $id): ?UserPayroll
    {
        return $this->userPayrollRepository->show($id);
    }

    public function createUserPayroll(array $data): ?UserPayroll
    {
        return $this->userPayrollRepository->create($data);
    }

    public function updateUserPayroll(array $data, int $id)
    {
        return $this->userPayrollRepository->update($data, $id);
    }

    public function deleteUserPayrollById(int $id)
    {
        return $this->userPayrollRepository->delete($id);
    }

    public function findByUserId(int $userId): ?UserPayroll
    {
        return UserPayroll::where('user_id', intval($userId))->first();
    }

    public function createPayslipSalariesAndHeads($requestData)
    {
        $userIds = $requestData['user_id'];
        $year = $requestData['year'];
        $month = $requestData['month'];

        DB::beginTransaction();
        try {
            foreach ($userIds as $userId) {
                $existingPayslipSalary = $this->getPayslipSalary(intval($userId), $year, $month);
                if ($existingPayslipSalary) {
                    continue;
                }

                if (isset($requestData['payroll_heads'][$userId])) {
                    $salaryHeadsData = $requestData['payroll_heads'][$userId];
                    foreach ($salaryHeadsData as $id => $salaryHeads) {
                        foreach ($salaryHeads as $salaryHeadId => $salaryHeadAmount) {
                            $payslipSalaryHeadData = [
                                'user_payroll_id' => intval($id),
                                'salary_head_id' => $salaryHeadId,
                                'amount' => $salaryHeadAmount
                            ];

                            $this->payslipSalaryHeadService->createPayslipSalaryHead($payslipSalaryHeadData);
                        }

                        $payslipSalary = new PayslipSalary();
                        $payslipSalary->user_id = intval($userId);
                        $payslipSalary->year = $year;
                        $payslipSalary->month = $month;

                        if ($payslipSalary->save()) {
                            $payslipInvoiceData = [
                                'invoice_id' => $payslipSalary->id . rand(100000, 999999),
                                'payslip_salary_id' => $payslipSalary->id,
                                'created_at' => now(),
                            ];

                            $this->payslipInvoiceService->createPayslipInvoice($payslipInvoiceData);
                        }
                    }
                }
            }

            DB::commit();
            return ['success' => true, 'message' => 'Salary create successfully.'];
        } catch (\Exception $e) {
            DB::rollback();
            return ['error' => true, 'message' => 'Salary create unsuccessfully'];
        }
    }

    public function getPayslipSalary(int $userId, $year, $month)
    {
        return PayslipSalary::where([
            'user_id' => intval($userId),
            'year' => $year,
            'month' => $month,
        ])->first();
    }
}
