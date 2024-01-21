<?php

declare(strict_types=1);

namespace App\Services;

use App\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\SalesRepository;
use App\Repositories\PurchasesRepository;
use App\Repositories\SalesReturnRepository;
use App\Repositories\TransactionRepository;
use App\Repositories\InventoryItemRepository;
use App\Repositories\PurchasesReturnRepository;
use App\Repositories\TransactionItemRepository;
use App\Repositories\InventoryCategoryRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Absolute;
use PhpOffice\PhpSpreadsheet\Calculation\TextData\Trim;

abstract class TransactionService
{
    protected string $transactionType;

    public function __construct(
        private readonly InventoryItemRepository $inventoryItemRepository,
        private readonly InventoryCategoryRepository $inventoryCategoryRepository,
        private readonly PurchasesRepository $purchasesRepository,
        private readonly TransactionRepository $transactionRepository,
        private readonly SalesRepository $salesRepository,
        private readonly PurchasesReturnRepository $purchasesReturnRepository,
        private readonly SalesReturnRepository $salesReturnRepository,
    ) {
    }

    public function getTransactions(): LengthAwarePaginator
    {
      
        return $this->transactionRepository->paginate( 20,['type' => $this->transactionType]);
    }

    public function getTransactionById(int $id): ?Transaction
    {
        return $this->transactionRepository->show($id);
    }

    /**
     * Create transaction.
     *
     * @param array $data
     * 
     * @throws \Throwable
     * @return boolean
     */
    public function createTransaction(array $data): bool
    {

        $isIncrement = $this->isIncrement($this->transactionType);

        try {
            $totalAmount = 0;
            foreach ($data['transaction_items'] as $item) {
                $totalAmount += (int) $item['quantity'] * (int) $item['price'];
            }
            $dueAmount = 0;

            // Determine payment status and dr_cr
            $paymentStatus = '';
            $dr_cr = 'dr';

            if ($totalAmount > (int) $data['paidAmount']) {
                $paymentStatus = 'due';
                $dr_cr = 'cr';
                $dueAmount = $totalAmount - (int) $data['paidAmount'];
            } elseif ($totalAmount === (int) $data['paidAmount']) {
                $paymentStatus = 'paid';
                $dr_cr = 'dr';
            } else {
                $paymentStatus = 'advance';
            }

            DB::beginTransaction();
            $transactionData = [
                'trans_date' => now(),
                'account_id' => 1,
                'trans_type' => $this->transactionType,
                'amount' => $totalAmount,
                'dr_cr' => $dr_cr,
                'due_amount' => $dueAmount,
                'chart_id' => 1,
                'paid_amount' => $data['paidAmount'],
                'payment_status' => $paymentStatus,
                'payee_payer_id' => (int) $data['supplierOrCustomerId'],
                'payment_method_id' => 1,
                'create_user_id' => Auth::user()->id,
                'reference' => $data['reference'] ?? null,
                'attachment' => '',
                'note' => $data['note'] ?? null,
                'created_at' => now(),
                'updated_at' => now()
            ];

            $transaction = $this->transactionRepository->create($transactionData);
            $transactionItems = [];
            $quantity = 0;

            // dd($data['transaction_items']);
            foreach ($data['transaction_items'] as $item) {

                if (
                    $this->transactionType == Transaction::PURCHASE_RETURN_TRANSACTION ||
                    $this->transactionType == Transaction::SALES_RETURN_TRANSACTION
                ) {
                    $quantity = (int) $item['returnQuantity'];
                } else {
                    $quantity = (int) $item['quantity'];
                }
                $transactionItems[] = [
                    'item_id' => (int) $item['item_id'],
                    'price' => (int) $item['price'],
                    'quantity' => (int) $item['quantity'],
                    'total' => (int) $item['price'] * (int) $item['quantity'],
                    'transaction_id' => $transaction->id,
                    'quantity_returned' => isset($item['returnQuantity']) && !empty($item['returnQuantity']) ? $item['returnQuantity'] : (isset($item['quantity']) && !empty($item['quantity']) ? $item['quantity'] : 0),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
               
                // Update total stock of item in current_stock.
                $this->inventoryItemRepository->updateCurrentStock((int) $item['item_id'], $quantity, $isIncrement);
            }

            if ($data['transactionType'] == Transaction::PURCHASE_TRANSACTION) {
                $this->purchasesRepository->bulkInsert($transactionItems);
            } elseif ($data['transactionType'] == Transaction::SALES_TRANSACTION) {
                $this->salesRepository->bulkInsert($transactionItems);
            } elseif ($data['transactionType'] == Transaction::PURCHASE_RETURN_TRANSACTION) {
                // dd($transactionItems);
                $this->purchasesReturnRepository->updateReturnQuantity($data['transaction_items']);
                $this->purchasesReturnRepository->bulkInsert($transactionItems);

            } elseif ($data['transactionType'] == Transaction::SALES_RETURN_TRANSACTION) {
                $this->salesReturnRepository->updateReturnQuantity($data['transaction_items']);
                $this->salesReturnRepository->bulkInsert($transactionItems);

            }
            DB::commit();

            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function updateTransaction(array $data, int $id): ?bool
    {
        // dd($data);
        $isIncrement = $this->isIncrement($this->transactionType);
        $transaction = $this->transactionRepository->show($id);
        if (!$transaction) {
            throw new \Exception('Transaction not found');
        }

        $totalAmount = 0;
        foreach ($data['transaction_items'] as $item) {
            $totalAmount += (int) $item['quantity'] * (int) $item['price'];
        }
        $dueAmount = 0;

        // Determine payment status and dr_cr
        $paymentStatus = '';
        $dr_cr = 'dr';

        if ($totalAmount > (int) $data['paidAmount']) {
            $paymentStatus = 'due';
            $dr_cr = 'cr';
            $dueAmount = $totalAmount - (int) $data['paidAmount'];
        } elseif ($totalAmount === (int) $data['paidAmount']) {
            $paymentStatus = 'paid';
            $dr_cr = 'dr';
        } else {
            $paymentStatus = 'advance';
        }

        try {
            $transactionData = [
                'trans_date' => now(),
                'account_id' => 1,
                'trans_type' => $data['transactionType'],
                'amount' => $totalAmount,
                'dr_cr' => $dr_cr,
                'due_amount' => $dueAmount,
                'chart_id' => 1,
                'paid_amount' => $data['paidAmount'],
                'payment_status' => $paymentStatus,
                'payee_payer_id' => (int) $data['supplierOrCustomerId'],
                'payment_method_id' => 1,
                'create_user_id' => Auth::user()->id,
                'reference' => $data['reference'] ?? null,
                'attachment' => '',
                'note' => $data['note'] ?? null,
                'created_at' => now(),
                'updated_at' => now()
            ];
            $this->transactionRepository->update($transactionData, $id);

            //    $transaction = $this->transactionRepository->create($transactionData);
            $purchaseItems = [];

            foreach ($data['transaction_items'] as $item) {
                $purchaseItem = [
                    'item_id' => (int) $item['item_id'],
                    'price' => (int) $item['price'],
                    'quantity' => (int) $item['quantity'],
                    'total' => (int) $item['price'] * (int) $item['quantity'],
                    'transaction_id' => $transaction->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                $purchaseItems[] = $purchaseItem;

                $quantity = (int) $item['quantity'];
                //  dd(Transaction::PURCHASE_TRANSACTION);

                if (isset($item['id'])) {
                    if ($this->transactionType == Transaction::PURCHASE_TRANSACTION) {
                        $purchaseItem = $this->purchasesRepository->show((int)$item['id']);
                        $quantity = abs($purchaseItem->quantity - (int) $item['quantity']);
                    } elseif ($this->transactionType == Transaction::SALES_TRANSACTION) {
                        $salesItem = $this->salesRepository->show((int) $item['id']);
                   
                        $quantity = abs($salesItem->quantity - (int) $item['quantity']);
                    }
                }

                $this->inventoryItemRepository->updateCurrentStock((int) $item['item_id'], (int) $quantity, $isIncrement);
            }
            if ($data['transactionType'] == Transaction::PURCHASE_TRANSACTION) {
                $transactionItemsUpdated = $this->purchasesRepository->bulkUpdate($purchaseItems, $id);
            } else {
                $transactionItemsUpdated = $this->salesRepository->bulkUpdate($purchaseItems, $id);
            }

            DB::commit();
            return $transactionItemsUpdated;
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
        return true;
    }
    public function delete($id): bool
    {
        try {
            DB::beginTransaction();
            $transaction = $this->transactionRepository->show($id);
            foreach ($transaction->items as $key => $item) {
                $isIncrement = $transaction->trans_type !== Transaction::PURCHASE_TRANSACTION;
                $this->inventoryItemRepository->updateCurrentStock((int) $item['item_id'], (int) $item['quantity'], $isIncrement);
            }
            $this->transactionRepository->delete($id);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
    public function deleteItem($id): bool
    {

        $this->transactionRepository->deleteItem($id, $this->transactionType);

        return true;
    }
    public function isIncrement($transactionType)
    {
        return $transactionType === Transaction::PURCHASE_TRANSACTION ||
            $transactionType === Transaction::SALES_RETURN_TRANSACTION;
    }
}
