<?php

declare(strict_types=1);

namespace App\Services;

use App\Section;
use App\Repositories\SectionRepository;
use App\Repositories\ClassModelRepository;
use Illuminate\Database\Eloquent\Collection;

class RoutineService
{
    public function __construct(
        private readonly ClassModelRepository $classModelRepository,
        private readonly SectionRepository $sectionRepository,
    ) {
    }

    public function getClassModels(): Collection
    {
        return $this->classModelRepository->all();
    }

    public function getSections(): Collection
    {
        return $this->sectionRepository->getSections();
    }

    public function findSectionByClassId(int $id): ?Collection
    {
        return $this->sectionRepository->getSectionsByClassId($id);
    }
}
