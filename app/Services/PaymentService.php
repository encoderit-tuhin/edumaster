<?php

declare(strict_types=1);

namespace App\Services;

use App\Payment;
use App\Services\UserPayrollService;
use Illuminate\Support\Facades\Auth;
use App\Repositories\PaymentRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PaymentService
{
    public const ADVANCED = 'advanced';
    public const DUE = 'due';
    public const ADVANCE_RETURN = 'advanced_return';

    public function __construct(
        private readonly PaymentRepository $paymentRepository,
        private readonly UserPayrollService $userPayrollService,
        private readonly AccountTransactionService $accountTransactionService,
    ) {
    }

    public function getPayments(array $filter = []): LengthAwarePaginator
    {
        return $this->paymentRepository->paginate(20, $filter);
    }

    public function findPaymentById(int $id): ?Payment
    {
        return $this->paymentRepository->show($id);
    }

    public function createPayment(array $data): ?Payment
    {
        return $this->paymentRepository->create($data);
    }

    public function updatePayment(array $data, int $id)
    {
        return $this->paymentRepository->update($data, $id);
    }

    public function deletePaymentById(int $id)
    {
        return $this->paymentRepository->delete($id);
    }

    public function processPayment(array $requestData): array
    {
        $payment = $this->handlePayment($requestData);

        if ($payment) {
            $userPayroll = $this->userPayrollService->findByUserId(intval($requestData['user_id']));

            if ($requestData['type'] === self::ADVANCED) {
                $userPayroll->current_advance += $requestData['amount'];
            } elseif ($requestData['type'] === self::DUE) {
                if ($requestData['amount'] >= $userPayroll->current_due) {
                    $userPayroll->current_advance += ($requestData['amount'] - $userPayroll->current_due);
                    $userPayroll->current_due = 0;
                } else {
                    $userPayroll->current_due -= $requestData['amount'];
                }
            } elseif ($requestData['type'] === self::ADVANCE_RETURN) {
                if ($userPayroll->current_advance >= $requestData['amount']) {
                    $userPayroll->current_advance -= $requestData['amount'];
                } else {
                    $remainingAmount = $requestData['amount'] - $userPayroll->current_advance;
                    $userPayroll->current_advance = 0;
                    $userPayroll->current_due += $remainingAmount;
                }
            }

            $userPayroll->save();

            return ['success' => true, 'message' => _lang(ucfirst($requestData['type']) . ' payment Successfully!')];
        }

        return ['success' => false, 'message' => _lang(ucfirst($requestData['type']) . ' payment Failed!')];
    }

    private function handlePayment(array $requestData): bool
    {
        $dateParts = explode('-', $requestData['date']);
        $year = $dateParts[0];
        $month = $dateParts[1];
        $paymentData = [
            'user_id' => intval($requestData['user_id']),
            'year' => $year,
            'month' => $month,
            'amount' => $requestData['amount'],
            'type' => $requestData['type'],
            'note' => $requestData['note'],
            'payment_method_id' => $requestData['payment_method_id'],
            'paid_by' => Auth::id(),
        ];

        if ($paymentData['type'] == 'advanced') {
            $this->accountTransactionService->prepareForAccTransAndDetails($paymentData, 'debit', 'payment');
        } elseif ($paymentData['type'] == 'due') {
            $this->accountTransactionService->prepareForAccTransAndDetails($paymentData, 'debit', 'payment');
        } elseif ($paymentData['type'] == 'advanced_return') {
            $this->accountTransactionService->prepareForAccTransAndDetails($paymentData, 'credit', 'receipt');
        }
        
        $this->createPayment($paymentData);


        return true;
    }
}
