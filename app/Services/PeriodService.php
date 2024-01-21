<?php

declare(strict_types=1);

namespace App\Services;

use App\Period;
use App\Repositories\PeriodRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PeriodService
{
    public function __construct(
        private readonly PeriodRepository $periodRepository
    ) {
    }

    public function getPeriods(array $filter = []): LengthAwarePaginator
    {
        return $this->periodRepository->paginate(20, $filter);
    }

    public function findPeriodById(int $id): ?Period
    {
        return $this->periodRepository->show($id);
    }

    public function createPeriod(array $data): ?Period
    {
        return $this->periodRepository->create($data);
    }

    public function updatePeriod(array $data, int $id)
    {
        return $this->periodRepository->update($data, $id);
    }

    public function deletePeriodById(int $id)
    {
        return $this->periodRepository->delete($id);
    }
}
