<?php

declare(strict_types=1);

namespace App\Repositories;

use App\BookCategory;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BookCategoryRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return BookCategory::all();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = BookCategory::query();

        // if (isset($filter['search'])) {
        //     $query->where('name', 'like', '%' . $filter['search'] . '%');
        // }

        return $query->orderBy('id', 'desc')->paginate($perPage);
    }

    public function create(array $data): ?BookCategory
    {
        return BookCategory::create($data);
    }

    public function update(array $data, int $id)
    {
        return BookCategory::find($id)->update($data);
    }

    public function delete(int $id)
    {
        return BookCategory::destroy($id);
    }

    public function show(int $id)
    {
        return BookCategory::find($id);
    }
}
