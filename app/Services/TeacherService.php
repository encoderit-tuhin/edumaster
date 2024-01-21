<?php

declare(strict_types=1);

namespace App\Services;

use App\Teacher;
use App\Repositories\TeacherRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TeacherService
{
    public function __construct(
        private readonly TeacherRepository $teacherRepository
    ) {
    }

    public function getTeachers(array $filter = []): LengthAwarePaginator
    {
        return $this->teacherRepository->paginate(20, $filter);
    }

    public function findTeacherById(int $id): ?Teacher
    {
        return $this->teacherRepository->show($id);
    }

    public function createTeacher(array $data): ?Teacher
    {
        return $this->teacherRepository->create($data);
    }

    public function updateTeacher(array $data, int $id)
    {
        return $this->teacherRepository->update($data, $id);
    }

    public function deleteTeacherById(int $id)
    {
        return $this->teacherRepository->delete($id);
    }
}
