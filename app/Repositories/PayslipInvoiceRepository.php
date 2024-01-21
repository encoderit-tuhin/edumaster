<?php

declare(strict_types=1);

namespace App\Repositories;

use App\PayslipInvoice;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PayslipInvoiceRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return PayslipInvoice::all();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = PayslipInvoice::query();

        // if (isset($filter['search'])) {
        //     $query->where('name', 'like', '%' . $filter['search'] . '%');
        // }

        return $query->paginate($perPage);
    }

    public function create(array $data): ?PayslipInvoice
    {
        return PayslipInvoice::create($data);
    }

    public function update(array $data, int $id)
    {
        return PayslipInvoice::find($id)->update($data);
    }

    public function delete(int $id)
    {
        return PayslipInvoice::destroy($id);
    }

    public function show(int $id)
    {
        return PayslipInvoice::find($id);
    }
}
