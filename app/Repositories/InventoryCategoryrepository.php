<?php

declare(strict_types=1);

namespace app\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Interfaces\BaseRepositoryInterface;
use App\Item;
use App\ItemCategory;

class InventoryCategoryRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return ItemCategory::orderBy('id', 'desc')->get();
    }
    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        return ItemCategory::orderBy('id', 'desc')->paginate($perPage);
    }
    public function create(array $data)
    {
        // dd($data);
        return ItemCategory::create($data);
    }
    public function update(array $data, int $id)
    {

        return ItemCategory::find($id)->update($data);
    }
    public function delete(int $id)
    {
        return ItemCategory::destroy($id);
    }
    public function show(int $id)
    {
        return ItemCategory::find($id);
    }
}