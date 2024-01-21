<?php

declare(strict_types=1);

namespace App\Services;

use App\FeeHead;
use App\Repositories\FeeHeadRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class FeeHeadService
{
    public function __construct(
        private readonly FeeHeadRepository $feeHeadRepository
    ) {
    }

    public function getFeeHeads(array $filter = []): LengthAwarePaginator
    {
        return $this->feeHeadRepository->paginate(20, $filter);
    }

    public function findFeeHeadById(int $id): ?FeeHead
    {
        return $this->feeHeadRepository->show($id);
    }

    public function createFeeHead(array $data): ?FeeHead
    {
        return $this->feeHeadRepository->create($data);
    }

    public function updateFeeHead(array $data, int $id)
    {
        return $this->feeHeadRepository->update($data, $id);
    }

    public function deleteFeeHeadById(int $id)
    {
        return $this->feeHeadRepository->delete($id);
    }
}
