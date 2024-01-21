<?php

declare(strict_types=1);

namespace App\Services;

use App\FeeSubHead;
use App\Repositories\FeeSubHeadRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class FeeSubHeadService
{
    public function __construct(
        private readonly FeeSubHeadRepository $feeSubHeadRepository
    ) {
    }

    public function getFeeSubHeads(array $filter = []): LengthAwarePaginator
    {
        return $this->feeSubHeadRepository->paginate(20, $filter);
    }

    public function findFeeSubHeadById(int $id): ?FeeSubHead
    {
        return $this->feeSubHeadRepository->show($id);
    }

    public function createFeeSubHead(array $data): ?FeeSubHead
    {
        return $this->feeSubHeadRepository->create($data);
    }

    public function updateFeeSubHead(array $data, int $id)
    {
        return $this->feeSubHeadRepository->update($data, $id);
    }

    public function deleteFeeSubHeadById(int $id)
    {
        return $this->feeSubHeadRepository->delete($id);
    }
}
