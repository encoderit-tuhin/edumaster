<?php

// declare(strict_types=1);

namespace App\Repositories;

use App\Purchase;
use App\Transaction;
use App\TransactionItem;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PurchasesRepository implements BaseRepositoryInterface
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

        return Purchase::create($data);
    }

    public function bulkInsert(array $data): bool
    {
        return Purchase::insert($data);
    }

    public function update(array $data, int $id)
    {

        return Purchase::find($id)->update($data);
    }
    public function bulkUpdate(array $datas, int $id)
    {
        // Delete all previous purchase
        Purchase::where('transaction_id', $id)->delete();

        foreach ($datas as $data) {
            Purchase::updateOrCreate(
                ['item_id' => $data['item_id'], 'transaction_id' => $id],
                $data
            );
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