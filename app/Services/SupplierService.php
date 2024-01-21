<?php

declare(strict_types=1);

namespace App\Services;

use App\Item;
use App\Leave;
use App\Supplier;
use Carbon\Carbon;
use App\ItemCategory;

use App\Repositories\SupplierRepository;
use Illuminate\Database\Eloquent\Collection;


class SupplierService
{
    public function __construct(
     
         private readonly SupplierRepository $supplierRepository,
    ) {
    }

    // Supplier
    public function getSupplierList(): Collection
    {
        return $this->supplierRepository->all();
    }
    public function getSupplierById(int $id): ?Supplier
    {
        return $this->supplierRepository->show($id);
    }
    public function createSupplier(array $data): ?Supplier
    {
        return $this->supplierRepository->create($data);
    }
    public function updateSupplier(array $data, int $id): ?bool
    {
        if (isset($data["status"])) {
            $data['status'] = 1;
        } else {
            $data['status'] = 0;
        }

        return $this->supplierRepository->update($data, $id);
    }
}
