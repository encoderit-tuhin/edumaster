<?php

declare(strict_types=1);

namespace App\Services;

use App\PayslipInvoice;
use App\Repositories\PayslipInvoiceRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PayslipInvoiceService
{
    public function __construct(
        private readonly PayslipInvoiceRepository $payslipInvoiceRepository

    ) {
    }

    public function getPayslipInvoices(array $filter = []): LengthAwarePaginator
    {
        return $this->payslipInvoiceRepository->paginate(20, $filter);
    }

    public function findPayslipInvoiceById(int $id): ?PayslipInvoice
    {
        return $this->payslipInvoiceRepository->show($id);
    }

    public function createPayslipInvoice(array $data): ?PayslipInvoice
    {
        return $this->payslipInvoiceRepository->create($data);
    }

    public function updatePayslipInvoice(array $data, int $id)
    {
        return $this->payslipInvoiceRepository->update($data, $id);
    }

    public function deletePayslipInvoiceById(int $id)
    {
        return $this->payslipInvoiceRepository->delete($id);
    }
}
