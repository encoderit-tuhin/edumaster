<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Book;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BookRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return Book::all();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = Book::query();

        // if (isset($filter['search'])) {
        //     $query->where('name', 'like', '%' . $filter['search'] . '%');
        // }

        return $query->orderBy('id', 'desc')->paginate($perPage);
    }

    public function create(array $data): ?Book
    {
        return Book::create($data);
    }

    public function update(array $data, int $id)
    {
        return Book::find($id)->update($data);
    }

    public function delete(int $id)
    {
        return Book::destroy($id);
    }

    public function show(int $id)
    {
        return Book::find($id);
    }
}
