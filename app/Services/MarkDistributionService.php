<?php

declare(strict_types=1);

namespace App\Services;

use App\MarkDistribution;
use App\Repositories\MarkDistributionRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class MarkDistributionService
{
    public function __construct(
        private readonly MarkDistributionRepository $markDistributionRepository
    ) {
    }

    public function getMarkDistributions(array $filter = []): LengthAwarePaginator
    {
        return $this->markDistributionRepository->paginate(20, $filter);
    }

    public function findMarkDistributionById(int $id): ?MarkDistribution
    {
        return $this->markDistributionRepository->show($id);
    }

    public function createMarkDistribution(array $data): ?MarkDistribution
    {
        return $this->markDistributionRepository->create($data);
    }

    public function updateMarkDistribution(array $data, int $id)
    {
        return $this->markDistributionRepository->update($data, $id);
    }

    public function deleteMarkDistributionById(int $id)
    {
        return $this->markDistributionRepository->delete($id);
    }
}
