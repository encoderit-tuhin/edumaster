<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Student;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class StudentRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return Student::all();
    }
    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = Student::query();

        // if (isset($filter['search'])) {
        //     $query->where('name', 'like', '%' . $filter['search'] . '%');
        // }

        return $query->paginate($perPage);
    }

    public function create(array $data): ?Student
    {
        return Student::create($data);
    }

    public function update(array $data, int $id)
    {
        return Student::find($id)->update($data);
    }

    public function delete(int $id)
    {
        return Student::destroy($id);
    }

    public function show(int $id)
    {
        return Student::find($id);
    }
}
