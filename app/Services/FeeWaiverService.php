<?php

declare(strict_types=1);

namespace App\Services;

use App\FeeWaiver;
use App\Repositories\FeeWaiverRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class FeeWaiverService
{
    public function __construct(
        private readonly FeeWaiverRepository $feeWaiverRepository
    ) {
    }

    public function getFeeWaivers(array $filter = []): LengthAwarePaginator
    {
        return $this->feeWaiverRepository->paginate(20, $filter);
    }

    public function findFeeWaiverById(int $id): ?FeeWaiver
    {
        return $this->feeWaiverRepository->show($id);
    }

    public function createFeeWaiver(array $data): ?FeeWaiver
    {
        return $this->feeWaiverRepository->create($data);
    }

    public function updateFeeWaiver(array $data, int $id)
    {
        return $this->feeWaiverRepository->update($data, $id);
    }

    public function deleteFeeWaiverById(int $id)
    {
        return $this->feeWaiverRepository->delete($id);
    }
}
