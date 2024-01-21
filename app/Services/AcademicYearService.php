<?php

declare(strict_types=1);

namespace App\Services;

use App\AcademicYear;
use App\Repositories\AcademicYearRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AcademicYearService
{
    public function __construct(
        private readonly AcademicYearRepository $academicYearRepository
    ) {
    }

    public function getAcademicYears(array $filter = []): LengthAwarePaginator
    {
        return $this->academicYearRepository->paginate(20, $filter);
    }

    public function findAcademicYearById(int $id): ?AcademicYear
    {
        return $this->academicYearRepository->show($id);
    }

    public function createAcademicYear(array $data): ?AcademicYear
    {
        return $this->academicYearRepository->create($data);
    }

    public function updateAcademicYear(array $data, int $id)
    {
        return $this->academicYearRepository->update($data, $id);
    }

    public function deleteAcademicYearById(int $id)
    {
        return $this->academicYearRepository->delete($id);
    }
}
