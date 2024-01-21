<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\CommitteeRepository;

use Illuminate\Database\Eloquent\Collection;
use App\Repositories\InventoryItemRepository;
use App\Repositories\InventoryCategoryRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Committee;
class CommitteeService
{
    public function __construct(private readonly CommitteeRepository $committeeRepository)
    {
    }
    public function getCommitteeMembers(): Collection
    {
        return $this->committeeRepository->all();
    }

    public function store(array $data): ?Committee
    {
        return $this->committeeRepository->create($data);
    }
    public function update(array $data,$id): ?bool
    {
        return $this->committeeRepository->update($data,$id);
    }
    public function findById($id):?Committee
    {
        return $this->committeeRepository->show($id);

    }
    public function delete($id):?bool
    {
        return $this->committeeRepository->delete($id);

    }
   
    // public function showById( $id):?Committee
    // {
    //     return $this->committeeRepository->show((int)$id);
    // }
}
