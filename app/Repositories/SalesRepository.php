<?php

// declare(strict_types=1);

namespace App\Repositories;

use App\Purchase;
use App\Transaction;
use App\TransactionItem;
use App\Interfaces\BaseRepositoryInterface;
use App\Sales;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class SalesRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return Transaction::where('trans_type', 'purchase')->orderBy('id', 'desc')->with('supplier')->get();
    }

  
    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        return Sales::paginate($perPage);
    }

    public function create(array $data): ?Purchase
    {

        return Sales::create($data);
    }

    public function bulkInsert(array $data): bool
    {
        return Sales::insert($data);
    }

    public function update(array $data, int $id)
    {

        return Sales::find($id)->update($data);
    }
    public function bulkUpdate(array $datas, int $id)
    {
        // Delete all previous purchase
        Sales::where('transaction_id', $id)->delete();

        foreach ($datas as $data) {
            Sales::updateOrCreate(
                ['item_id' => $data['item_id'], 'transaction_id' => $id],
                $data
            );
        }
        return true;
    }
    public function delete(int $id)
    {
        return Sales::destroy($id);
    }
    public function show(int $id)
    {
        return Sales::find($id);
    }
}