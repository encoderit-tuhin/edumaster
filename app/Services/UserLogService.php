<?php

declare(strict_types=1);

namespace App\Services;

use App\UserLog;
use App\Repositories\UserLogRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserLogService
{
    public function __construct(
        private readonly UserLogRepository $userLogRepository
    ) {
    }

    public function getUserLogs(array $filter = []): LengthAwarePaginator
    {
        return $this->userLogRepository->paginate(20, $filter);
    }

    public function findUserLogById(int $id): ?UserLog
    {
        return $this->userLogRepository->show($id);
    }

    public function createUserLog(array $data): ?UserLog
    {
        return $this->userLogRepository->create($data);
    }

    public function updateUserLog(array $data, int $id)
    {
        return $this->userLogRepository->update($data, $id);
    }

    public function deleteUserLogById(int $id)
    {
        return $this->userLogRepository->delete($id);
    }
}
