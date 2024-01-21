<?php

declare(strict_types=1);

namespace App\Services;

use App\Section;
use App\Repositories\SectionRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class SectionService
{
    public function __construct(
        private readonly SectionRepository $sessionRepository
    ) {
    }

    public function getSections(array $filter = []): LengthAwarePaginator
    {
        return $this->sessionRepository->paginate(40, $filter);
    }

    public function findSectionById(int $id): ?Section
    {
        return $this->sessionRepository->show($id);
    }

    public function createSection(array $data): ?Section
    {
        return $this->sessionRepository->create($data);
    }

    public function updateSection(array $data, int $id)
    {
        return $this->sessionRepository->update($data, $id);
    }

    public function deleteSectionById(int $id)
    {
        return $this->sessionRepository->delete($id);
    }
}
