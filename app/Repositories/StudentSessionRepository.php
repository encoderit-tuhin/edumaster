<?php

declare(strict_types=1);

namespace App\Repositories;

use App\StudentSession;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class StudentSessionRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return StudentSession::all();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = StudentSession::query();

        // if (isset($filter['search'])) {
        //     $query->where('name', 'like', '%' . $filter['search'] . '%');
        // }

        return $query->paginate($perPage);
    }

    public function create(array $data): ?StudentSession
    {
        return StudentSession::create($data);
    }

    public function update(array $data, int $id)
    {
        $session = $this->show($id);

        if (!$session) {
            return null;
        }

        return $session->update($data);
    }

    public function findStudentSessionByStudentId(int $id): ?StudentSession
    {
        return StudentSession::where('student_id', $id)->first();
    }

    public function delete(int $id)
    {
        return StudentSession::destroy($id);
    }

    public function show(int $id)
    {
        return StudentSession::find($id);
    }
    public function studentByClassId(int $id)
    {
        return StudentSession::where('class_id', $id)->get();
    }
}
