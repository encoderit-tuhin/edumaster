<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Interfaces\BaseRepositoryInterface;
use App\Purchase;
use App\Sales;
use App\Transaction;
use PHPUnit\Event\Tracer\Tracer;

class TransactionRepository implements BaseRepositoryInterface
{
    public function __construct(
        private readonly InventoryItemRepository $inventoryItemRepository){

        }
    public function all(): Collection
    {
        return Transaction::all();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = Transaction::orderBy('id', 'desc')
            ->where('trans_type', $filter['type']);

        if ($filter['type'] == Transaction::SALES_TRANSACTION|| $filter['type'] == Transaction::SALES_RETURN_TRANSACTION) {
            $query->with('customer');
        } elseif($filter['type'] == Transaction::PURCHASE_TRANSACTION || $filter['type'] == Transaction::PURCHASE_RETURN_TRANSACTION) {
            $query->with('supplier');
        }

        return $query->paginate($perPage);
    }

    public function create(array $data): ?Transaction
    {
        return Transaction::create($data);
    }

    public function update(array $data, int $id)
    {
        // dd($data);
        return Transaction::find($id)->update($data);
    }

    public function delete(int $id): bool
    {
        $transaction = $this->show($id);

        return $transaction->delete();
    }

    public function show(int $id): ?Transaction
    {
        $transaction = Transaction::find($id);
        // dd($transaction->trans_type);

        return $transaction->trans_type == (Transaction::SALES_TRANSACTION ||Transaction::SALES_RETURN_TRANSACTION)   ?
            Transaction::with('customer', 'salesItems','purchasesReturn')->find($id) :
            Transaction::with('supplier', 'purchasesItems','salesReturn')->find($id);
    }
    public function deleteItem(int $id, $type): bool
    {
        if ($type === Transaction::PURCHASE_TRANSACTION) {
            $purchaseItem = Purchase::find($id);
            $this->inventoryItemRepository->updateCurrentStock((int) $purchaseItem['item_id'], (int) $purchaseItem['quantity'], false);
            return $purchaseItem->delete();
        } elseif ($type === Transaction::SALES_TRANSACTION) {
            $salesItem = Sales::find($id);
            $this->inventoryItemRepository->updateCurrentStock((int) $salesItem['item_id'], (int) $salesItem['quantity'], true);
            return $salesItem->delete();
        }
        else{
            return false;
        }
      
    }
}
