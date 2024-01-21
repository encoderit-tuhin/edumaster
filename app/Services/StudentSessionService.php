<?php

declare(strict_types=1);

namespace App\Services;

use App\StudentSession;
use App\Repositories\StudentSessionRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class StudentSessionService
{
    public function __construct(
        private readonly StudentSessionRepository $studentSessionRepository
    ) {
    }

    public function getAllStudentSessions()
    {
        return $this->studentSessionRepository->all();
    }
    public function getStudentSessions(array $filter = []): LengthAwarePaginator
    {
        return $this->studentSessionRepository->paginate(20, $filter);
    }

    public function findStudentSessionById(int $id): ?StudentSession
    {
        return $this->studentSessionRepository->show($id);
    }

    public function createStudentSession(array $data): ?StudentSession
    {
        return $this->studentSessionRepository->create($data);
    }

    public function updateStudentSession(array $data, int $id)
    {
        return $this->studentSessionRepository->update($data, $id);
    }

    public function findStudentSessionByStudentId(int $id): ?StudentSession
    {
        return $this->studentSessionRepository->findStudentSessionByStudentId($id);
    }

    public function deleteStudentSessionById(int $id)
    {
        return $this->studentSessionRepository->delete($id);
    }
    public function getStudentByClassId(int $id)
    {
        return $this->studentSessionRepository->studentByClassId($id);
    }
}
