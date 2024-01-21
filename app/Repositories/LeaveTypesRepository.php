<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Interfaces\BaseRepositoryInterface;
use App\LeaveTypes;

class LeaveTypesRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return LeaveTypes::all();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        return LeaveTypes::paginate($perPage);
    }

    public function create(array $data)
    {
        return LeaveTypes::create($data);
    }

    public function update(array $data, int $id)
    {
        return LeaveTypes::find($id)->update($data);
    }

    public function delete(int $id)
    {
        return LeaveTypes::destroy($id);
    }

    public function show(int $id)
    {
        return LeaveTypes::find($id);
    }

    // public function getLeavesTypes()
    // {
    //     return LeaveTypes::all();
    // }
    // public function getLeaveStatusTypes()
    // {
    //      return [
    //         'Pending',
    //         'Approved',
    //         'Rejected',
    //         'Cancelled',
    //         'Completed',
    //         // Add more status types as needed
    //     ];
    // }
}