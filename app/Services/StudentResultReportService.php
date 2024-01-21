<?php

declare(strict_types=1);

namespace App\Services;

use App\StudentResultReport;
use App\Repositories\StudentResultReportRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class StudentResultReportService
{
    public function __construct(
        private readonly StudentResultReportRepository $studentResultReportRepository
    ) {
    }

    public function getStudentResultReports(array $filter = []): LengthAwarePaginator
    {
        return $this->studentResultReportRepository->paginate(1000, $filter);
    }

    public function findStudentResultReportById(int $id): ?StudentResultReport
    {
        return $this->studentResultReportRepository->show($id);
    }

    public function createStudentResultReport(array $data): ?StudentResultReport
    {
        return $this->studentResultReportRepository->create($data);
    }

    public function updateStudentResultReport(array $data, int $id)
    {
        return $this->studentResultReportRepository->update($data, $id);
    }

    public function deleteStudentResultReportById(int $id)
    {
        return $this->studentResultReportRepository->delete($id);
    }
}
