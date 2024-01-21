<?php

declare(strict_types=1);

namespace App\Services;

use App\Book;
use App\Repositories\BookRepository;
use Intervention\Image\Facades\Image;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BookService
{
    public function __construct(
        private readonly BookRepository $bookRepository
    ) {
    }

    public function getBookCategories(array $filter = []): LengthAwarePaginator
    {
        return $this->bookRepository->paginate(20, $filter);
    }

    public function findBookById(int $id): ?Book
    {
        return $this->bookRepository->show($id);
    }

    public function createOrUpdateBook(array $data, $id = null): ?Book
    {
        $data = $this->prepareForDB($data);

        if ($id === null) {
            $book = $this->bookRepository->create($data);
            return $book;
        } else {
            $result = $this->bookRepository->update($data, intval($id));

            if ($result) {
                return $this->findBookById((int) $id);
            } else {
                return null;
            }
        }
    }

    public function deleteBookById(int $id)
    {
        return $this->bookRepository->delete($id);
    }

    public function prepareForDB(array $data)
    {
        $preparedData = array_merge($data);

        if (isset($data['photo']) && $data['photo']->isValid()) {
            $photo = $data['photo'];
            $ImageName = time() . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->resize(160, 160)->save(base_path('public/uploads/images/books/') . $ImageName);
            $preparedData['photo'] = $ImageName;
        }

        if (isset($data['barcode']) && $data['barcode']->isValid()) {
            $barcode = $data['barcode'];
            $ImageName = time() . '.' . $barcode->getClientOriginalExtension();
            Image::make($barcode)->resize(350, 200)->save(base_path('public/uploads/images/books/bar_codes/') . $ImageName);
            $preparedData['barcode'] = $ImageName;
        }

        return $preparedData;
    }
}
