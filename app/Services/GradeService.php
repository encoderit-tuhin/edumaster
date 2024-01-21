<?php

declare(strict_types=1);

namespace App\Services;

use App\Grade;
use App\Repositories\GradeRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class GradeService
{
    public function __construct(
        private readonly GradeRepository $gradeRepository
    ) {
    }

    public function getGrades(array $filter = []): LengthAwarePaginator
    {
        return $this->gradeRepository->paginate(20, $filter);
    }

    public function findGradeById(int $id): ?Grade
    {
        return $this->gradeRepository->show($id);
    }

    public function createGrade(array $data): ?Grade
    {
        return $this->gradeRepository->create($data);
    }

    public function updateGrade(array $data, int $id)
    {
        return $this->gradeRepository->update($data, $id);
    }

    public function deleteGradeById(int $id)
    {
        return $this->gradeRepository->delete($id);
    }
}
