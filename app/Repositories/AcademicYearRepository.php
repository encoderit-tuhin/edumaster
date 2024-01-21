<?php

declare(strict_types=1);

namespace App\Repositories;

use App\AcademicYear;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AcademicYearRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return AcademicYear::all();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = AcademicYear::query();

        // if (isset($filter['search'])) {
        //     $query->where('name', 'like', '%' . $filter['search'] . '%');
        // }

        return $query->orderBy('id', 'desc')->paginate($perPage);
    }

    public function create(array $data): ?AcademicYear
    {
        return AcademicYear::create($data);
    }

    public function update(array $data, int $id)
    {
        return AcademicYear::find($id)->update($data);
    }

    public function delete(int $id)
    {
        return AcademicYear::destroy($id);
    }

    public function show(int $id)
    {
        return AcademicYear::find($id);
    }
}
