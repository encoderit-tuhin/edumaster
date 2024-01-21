<?php

declare(strict_types=1);

namespace App\Services;

use App\PhoneBook;
use Intervention\Image\Facades\Image;
use App\Repositories\PhoneBookRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PhoneBookService
{
    public function __construct(
        private readonly PhoneBookRepository $phoneBookRepository
    ) {
    }

    public function getPhoneBooks()
    {
        return $this->phoneBookRepository->all();
    }

    public function store(array $data): ?PhoneBook
    {
        return $this->phoneBookRepository->create($data);
    }
    public function update(array $data, $id): ?bool
    {
        return $this->phoneBookRepository->update($data, $id);
    }
    public function findById($id): ?PhoneBook
    {
        return $this->phoneBookRepository->show($id);
    }
    public function delete($id): ?bool
    {
        return $this->phoneBookRepository->delete($id);
    }
}
