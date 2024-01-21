<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Interfaces\BaseRepositoryInterface;
use App\Leave;
use App\Testimonial;
use App\TransferCertificate;

class TransferCertificateRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return TransferCertificate::with('student')->get();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = TransferCertificate::query();

        // if (isset($filter['search'])) {
        //     $query->where('name', 'like', '%' . $filter['search'] . '%');
        // }

        $query->join('leave_types', 'leave_types.id', '=', 'leaves.leave_type')
            ->select('leaves.*', 'leave_types.name as leave_type_name');

        return $query->paginate($perPage);
    }

    public function create(array $data): ?TransferCertificate
    {
        return TransferCertificate::create($data);
    }

    public function update(array $data, int $id): ?TransferCertificate
    {
        $tc = $this->show($id);
        if ($tc) {
            $tc->update($data);
        }
        return $tc;
    }

    public function show(int $id): ?TransferCertificate
    {
        return TransferCertificate::with('student')->find($id);
    }
    public function delete(int $id)
    {
        return TransferCertificate::destroy($id);
    }

    public function userHasPreviousLeaveInDateRange(string $fromDate, string $toDate, int $userId): bool
    {
        return TransferCertificate::where('submit_by', $userId)
            ->where('from_date', '<=', $toDate)
            ->where('to_date', '>=', $fromDate)
            ->exists();
    }

  
}
