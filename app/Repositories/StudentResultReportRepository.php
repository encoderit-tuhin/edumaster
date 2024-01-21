<?php

declare(strict_types=1);

namespace App\Repositories;

use App\StudentResultReport;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class StudentResultReportRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return StudentResultReport::all();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = StudentResultReport::query();

        // if (isset($filter['search'])) {
        //     $query->where('name', 'like', '%' . $filter['search'] . '%');
        // }

        return $query->orderBy('id', 'asc')->paginate($perPage);
    }

    public function create(array $data): ?StudentResultReport
    {
        return StudentResultReport::create($data);
    }

    public function update(array $data, int $id)
    {
        return StudentResultReport::find($id)->update($data);
    }

    public function delete(int $id)
    {
        return StudentResultReport::destroy($id);
    }

    public function show(int $id)
    {
        return StudentResultReport::find($id);
    }
}
