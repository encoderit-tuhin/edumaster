<?php

declare(strict_types=1);

namespace App\Repositories;

use App\PhoneBookCategory;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PhoneBookCategoryRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return PhoneBookCategory::latest()->get();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = PhoneBookCategory::query();
       

        return $query->paginate($perPage);
    }

    public function create($data): ?PhoneBookCategory
    {
        $phoneBookCategory = PhoneBookCategory::create($data);
        return $phoneBookCategory;
    }

    public function update(array $data, $id): ?bool
    {
        $phoneBookCategory = PhoneBookCategory::find($id);
        if ($phoneBookCategory) {
            $phoneBookCategory->update($data);
            return true;
        }

        return false;
    }

    public function show($id): ?phoneBookCategory
    {
        $phoneBookCategory = PhoneBookCategory::find($id);
        if ($phoneBookCategory) {
            return $phoneBookCategory;
        }

        return false;
    }
    public function delete($id): ?bool
    {
        PhoneBookCategory::destroy($id);
        return true;
    }
}
