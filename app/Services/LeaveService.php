<?php

declare(strict_types=1);

namespace App\Services;

use App\Leave;
use App\Repositories\LeaveRepository;
use App\Repositories\LeaveTypesRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class LeaveService
{
    public function __construct(
        private readonly LeaveTypesRepository $leaveTypesRepository,
        private readonly LeaveRepository $leaveRepository
    ) {
    }

    public function getLeavesTypes(): Collection
    {
        return $this->leaveTypesRepository->all();
    }

    public function getLeavesStatuses(): array
    {
        return [
            'pending' => __('Pending'),
            'approved' => __('Approved'),
            'rejected' => __('Rejected'),
            'cancelled' => __('Cancelled'),
        ];
    }

    public function getLeaves(array $filter = []): LengthAwarePaginator
    {
        return $this->leaveRepository->paginate(20, $filter);
    }

    public function findLeaveById(int $id): ?Leave
    {
        return $this->leaveRepository->show($id);
    }

    public function createLeave(array $data): ?Leave
    {
        return $this->leaveRepository->create(
            array_merge(
                $data,
                [
                    'student_id' => $data['student_id'] ?? auth()->id(),
                    'submit_by' => $data['submit_by'] ?? auth()->id(),
                ]
            )
        );
    }

    public function userHasPreviousLeaveInDateRange(string $fromDate, string $toDate, int $userId): bool
    {
        return $this->leaveRepository->userHasPreviousLeaveInDateRange(
            $fromDate,
            $toDate,
            $userId
        );
    }

    public function updateLeave(array $data, int $id): ?Leave
    {
        return $this->leaveRepository->update($data, $id);

        // // Add this with new table - student.
        // if ($leave->status == 'approved') {
        //     $this->userRepository->incrementLeaveCount($leave->submit_by);
        // }
        // return false;
    }
    public function deleteLeaveById(int $id)
    {
        return $this->leaveRepository->delete($id);
    }
    public function updateLeaveStatus($request, int $id): bool
    {
        // $leave->status = $request->status;
        // $leave->save();
        return $this->leaveRepository->updateLeaveStatus($request, $id);
    }
}
