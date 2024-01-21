<?php

declare(strict_types=1);

namespace App\Services;

use App\AbsentFine;
use App\Repositories\AbsentFineRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AbsentFineService
{
    public function __construct(
        private readonly AbsentFineRepository $feeRepository
    ) {
    }

    public function getAbsentFines(array $filter = []): LengthAwarePaginator
    {
        return $this->feeRepository->paginate(20, $filter);
    }

    public function findAbsentFineById(int $id): ?AbsentFine
    {
        return $this->feeRepository->show($id);
    }

    public function createAbsentFine(array $data): ?AbsentFine
    {
        return $this->feeRepository->create($data);
    }

    public function updateAbsentFine(array $data, int $id)
    {
        return $this->feeRepository->update($data, $id);
    }

    public function deleteAbsentFineById(int $id)
    {
        return $this->feeRepository->delete($id);
    }
}
