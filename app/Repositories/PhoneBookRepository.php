<?php

declare(strict_types=1);

namespace App\Repositories;

use Image;
use App\PhoneBook;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PhoneBookRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return PhoneBook::latest()->with('category')->get();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = PhoneBook::query();
       

        return $query->paginate($perPage);
    }

    public function create($data): ?PhoneBook
    {
        $phoneBook = PhoneBook::create($data);
        return $phoneBook;
    }

    public function update(array $data, $id): ?bool
    {
        $phoneBook = PhoneBook::find($id);
        if ($phoneBook) {
            $phoneBook->update($data);
            return true;
        }

        return false;
    }

    public function show($id): ?phoneBook
    {
        $phoneBook = PhoneBook::find($id);
        if ($phoneBook) {
            return $phoneBook;
        }

        return false;
    }
    public function delete($id): ?bool
    {
        PhoneBook::destroy($id);
        return true;
    }
}
