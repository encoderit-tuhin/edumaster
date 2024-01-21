<?php

// declare(strict_types=1);

namespace App\Repositories;

use App\Sales;
use App\Purchase;
use App\SalesReturn;
use App\Transaction;
use App\PurchasesReturn;
use App\TransactionItem;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class SalesReturnRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return Transaction::where('trans_type', 'purchase')->orderBy('id', 'desc')->with('supplier')->get();
    }

  
    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        return SalesReturn::paginate($perPage);
    }

    public function create(array $data): ?Purchase
    {

        return SalesReturn::create($data);
    }

    public function bulkInsert(array $data): bool
    {
        return SalesReturn::insert($data);
    }

    public function update(array $data, int $id)
    {

        return SalesReturn::find($id)->update($data);
    }
    public function updateReturnQuantity(array $salesReturnItems)
    {
        foreach ($salesReturnItems as $item) {
            //  dd($item);
             if ($item['quantity']<$item['returnQuantity'] || $item['returnQuantity'] <0  ) {
                abort(403);
               
             }
            SalesReturn::where('item_id', $item['item_id'])
            ->update(['quantity_returned' => $item['returnQuantity']]);
        
        }
        return true;
    }
    public function delete(int $id)
    {
        return SalesReturn::destroy($id);
    }
    public function show(int $id)
    {
        return SalesReturn::find($id);
    }
}