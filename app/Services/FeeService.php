<?php

declare(strict_types=1);

namespace App\Services;

use App\Fee;
use App\Repositories\FeeRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class FeeService
{
    public function __construct(
        private readonly FeeRepository $feeRepository
    ) {
    }

    public function getFees(array $filter = []): LengthAwarePaginator
    {
        return $this->feeRepository->paginate(20, $filter);
    }

    public function findFeeById(int $id): ?Fee
    {
        return $this->feeRepository->show($id);
    }

    public function createFee(array $data): ?Fee
    {
        // Update the session_id with the current session_id.
        $data['session_id'] = get_option('academic_year');

        return $this->feeRepository->create($data);
    }

    public function updateFee(array $data, int $id)
    {
        return $this->feeRepository->update($data, $id);
    }

    public function deleteFeeById(int $id)
    {
        return $this->feeRepository->delete($id);
    }
}
