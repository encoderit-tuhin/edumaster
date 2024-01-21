<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Payment;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PaymentRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return Payment::all();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = Payment::query();

        // if (isset($filter['search'])) {
        //     $query->where('name', 'like', '%' . $filter['search'] . '%');
        // }

        return $query->paginate($perPage);
    }

    public function create(array $data): ?Payment
    {
        return Payment::create($data);
    }

    public function update(array $data, int $id)
    {
        return Payment::find($id)->update($data);
    }

    public function delete(int $id)
    {
        return Payment::destroy($id);
    }

    public function show(int $id)
    {
        return Payment::find($id);
    }
}
