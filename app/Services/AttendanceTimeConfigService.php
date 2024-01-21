<?php

declare(strict_types=1);

namespace App\Services;

use App\AttendanceTimeConfig;
use App\Repositories\AttendanceTimeConfigRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AttendanceTimeConfigService
{
    public function __construct(
        private readonly AttendanceTimeConfigRepository $attendanceTimeConfigRepository
    ) {
    }

    public function getAttendanceTimeConfigs(array $filter = []): LengthAwarePaginator
    {
        return $this->attendanceTimeConfigRepository->paginate(20, $filter);
    }

    public function findAttendanceTimeConfigById(int $id): ?AttendanceTimeConfig
    {
        return $this->attendanceTimeConfigRepository->show($id);
    }

    public function createAttendanceTimeConfig(array $data): ?AttendanceTimeConfig
    {
        return $this->attendanceTimeConfigRepository->create($data);
    }

    public function updateAttendanceTimeConfig(array $data, int $id)
    {
        return $this->attendanceTimeConfigRepository->update($data, $id);
    }

    public function deleteAttendanceTimeConfigById(int $id)
    {
        return $this->attendanceTimeConfigRepository->delete($id);
    }
}
