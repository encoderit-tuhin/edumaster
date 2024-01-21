<?php

// declare(strict_types=1);

namespace App\Repositories;

use App\Purchase;
use App\Transaction;
use App\TransactionItem;
use App\Interfaces\BaseRepositoryInterface;
use App\PurchasesReturn;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PurchasesReturnRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return Transaction::where('trans_type', 'purchase')->orderBy('id', 'desc')->with('supplier')->get();
    }

  
    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        return Purchase::paginate($perPage);
    }

    public function create(array $data): ?Purchase
    {

        // dd($data);
        return PurchasesReturn::create($data);
    }

    public function bulkInsert(array $data): bool
    {
        // dd($data);
        return PurchasesReturn::insert($data);
    }

    public function update(array $data, int $id)
    {

        return Purchase::find($id)->update($data);
    }
    public function updateReturnQuantity(array $purchaseReturnItems)
    {
        foreach ($purchaseReturnItems as $item) {
            //  dd($item);
             if ((int)$item['quantity']< (int) $item['returnQuantity'] || (int)$item['returnQuantity'] <0  ) {
                abort(403);
               
             }
            Purchase::where('item_id', $item['item_id'])
            ->update(['quantity_returned' => (int)$item['returnQuantity']]);
        
        }
        return true;
    }
    public function delete(int $id)
    {
        return Purchase::destroy($id);
    }
    public function show(int $id)
    {
        return Purchase::find($id);
    }
}