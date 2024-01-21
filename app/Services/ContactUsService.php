<?php

declare(strict_types=1);

namespace App\Services;

use App\Contact;
use App\Item;
use App\Leave;
use App\Supplier;
use Carbon\Carbon;
use App\ItemCategory;

use App\Repositories\PurchaseRepository;
use App\Repositories\SupplierRepository;
use App\Repositories\ContactUsRepository;
use App\Repositories\TransactionRepository;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\InventoryItemRepository;
use App\Repositories\InventoryCategoryRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ContactUsService
{
    public function __construct(private readonly ContactUsRepository $contactUsRepository)
    {
    }
    public function getContactsMessage(): Collection
    {
        return $this->contactUsRepository->all();
    }

    public function store(array $data): ?Contact
    {
        return $this->contactUsRepository->create($data);
    }
    public function changeMessageStatus($id):bool
    {
        return $this->contactUsRepository->changeMessageStatus($id);
    }
}
