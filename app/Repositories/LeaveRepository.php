<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Interfaces\BaseRepositoryInterface;
use App\Leave;

class LeaveRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return Leave::all();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = Leave::query();

        // if (isset($filter['search'])) {
        //     $query->where('name', 'like', '%' . $filter['search'] . '%');
        // }

        $query->join('leave_types', 'leave_types.id', '=', 'leaves.leave_type')
            ->select('leaves.*', 'leave_types.name as leave_type_name');

        return $query->paginate($perPage);
    }

    public function create(array $data): ?Leave
    {
        return Leave::create($data);
    }

    public function update(array $data, int $id): ?Leave
    {
        $leave = $this->show($id);
        if ($leave) {
            $leave->update($data);
        }
        return $leave;
    }

    public function show(int $id): ?Leave
    {
        return Leave::find($id);
    }
    public function delete(int $id)
    {
        return Leave::destroy($id);
    }

    public function userHasPreviousLeaveInDateRange(string $fromDate, string $toDate, int $userId): bool
    {
        return Leave::where('submit_by', $userId)
            ->where('from_date', '<=', $toDate)
            ->where('to_date', '>=', $fromDate)
            ->exists();
    }

    public function updateLeaveStatus($request, int $id): bool
    {
        $leave = $this->show($id);
        if ($leave) {
            $leave->status = $request->status;
            $leave->approve_by = auth()->id();

            return  $leave->save();
        }
        return false;
    }
}
