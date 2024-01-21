<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Interfaces\BaseRepositoryInterface;
use App\Leave;
use App\Testimonial;

class TestimonialRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return Testimonial::with('student')->get();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = Testimonial::query();

        // if (isset($filter['search'])) {
        //     $query->where('name', 'like', '%' . $filter['search'] . '%');
        // }

        $query->join('leave_types', 'leave_types.id', '=', 'leaves.leave_type')
            ->select('leaves.*', 'leave_types.name as leave_type_name');

        return $query->paginate($perPage);
    }

    public function create(array $data): ?Testimonial
    {
        return Testimonial::create($data);
    }

    public function update(array $data, int $id): ?Testimonial
    {
        $leave = $this->show($id);
        if ($leave) {
            $leave->update($data);
        }
        return $leave;
    }

    public function show(int $id): ?Testimonial
    {
        return Testimonial::with('student.studentGroup')->find($id);
    }
    public function delete(int $id)
    {
        return Testimonial::destroy($id);
    }

    public function userHasPreviousLeaveInDateRange(string $fromDate, string $toDate, int $userId): bool
    {
        return Testimonial::where('submit_by', $userId)
            ->where('from_date', '<=', $toDate)
            ->where('to_date', '>=', $fromDate)
            ->exists();
    }

  
}
