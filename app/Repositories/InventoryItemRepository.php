<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Interfaces\BaseRepositoryInterface;
use App\Item;

class InventoryItemRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return Item::all();
    }
    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        return Item::paginate($perPage);
    }
    public function create(array $data)
    {
        // dd($data);
        return Item::create($data);
    }
    public function update(array $data, int $id)
    {
        return Item::find($id)->update($data);
    }
    public function delete(int $id)
    {
        return Item::destroy($id);
    }

    public function show(int $id)
    {
        return Item::findOrFail($id);
    }

    public function updateCurrentStock(int $id, int $qty, $isIncrement)
    {
        // dd( $qty);
        $query = Item::where('id', $id);

        return $isIncrement ? $query->increment('current_stock', $qty) :
            $query->decrement('current_stock', $qty);
    }
}