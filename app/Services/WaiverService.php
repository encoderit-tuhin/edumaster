<?php

declare(strict_types=1);

namespace App\Services;

use App\Waiver;
use App\Repositories\WaiverRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class WaiverService
{
    public function __construct(
        private readonly WaiverRepository $waiverRepository
    ) {
    }

    public function getWaivers(array $filter = []): LengthAwarePaginator
    {
        return $this->waiverRepository->paginate(20, $filter);
    }

    public function findWaiverById(int $id): ?Waiver
    {
        return $this->waiverRepository->show($id);
    }

    public function createWaiver(array $data): ?Waiver
    {
        return $this->waiverRepository->create($data);
    }

    public function updateWaiver(array $data, int $id)
    {
        return $this->waiverRepository->update($data, $id);
    }

    public function deleteWaiverById(int $id)
    {
        return $this->waiverRepository->delete($id);
    }
}
