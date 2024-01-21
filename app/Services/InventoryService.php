<?php

declare(strict_types=1);

namespace App\Services;

use App\Item;
use App\ItemCategory;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\InventoryItemRepository;
use App\Repositories\InventoryCategoryRepository;

class InventoryService
{
    public function __construct(
        private readonly InventoryItemRepository $inventoryItemRepository,
        private readonly InventoryCategoryRepository $inventoryCategoryRepository,

    ) {
    }
    public function getItemList(): Collection
    {
        return $this->inventoryItemRepository->all();
    }
    public function getItemById(int $id): ?Item
    {
        return $this->inventoryItemRepository->show($id);
    }
    public function createItem(array $data): ?Item
    {
        $data['current_stock'] = (int) $data['opening_stock'] ?? 0;
        return $this->inventoryItemRepository->create($data);
    }
    public function updateItem(array $data, int $id): ?bool
    {
        return $this->inventoryItemRepository->update($data, $id);
    }
    // category
    public function getCategoryList(): Collection
    {
        return $this->inventoryCategoryRepository->all();
    }
    public function getCategoryById(int $id): ?ItemCategory
    {
        return $this->inventoryCategoryRepository->show($id);
    }
    public function createCategory(array $data): ?itemCategory
    {
        return $this->inventoryCategoryRepository->create($data);
    }
    public function updateCategory(array $data, int $id): ?bool
    {
        return $this->inventoryCategoryRepository->update($data, $id);
    }
}
