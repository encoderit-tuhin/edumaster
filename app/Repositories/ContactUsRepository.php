<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Interfaces\BaseRepositoryInterface;
use App\Item;
use App\Contact;

class ContactUsRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return Contact::orderBy('id', 'desc')->get();
    }
    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        return Contact::orderBy('id', 'desc')->paginate($perPage);
    }
    public function create(array $data): Contact
    {
        return Contact::create($data);
    }
    public function update(array $data, int $id)
    {
        return Contact::find($id)->update($data);
    }
    public function delete(int $id)
    {
        return Contact::destroy($id);
    }
    public function show(int $id)
    {
        return Contact::find($id);
    }
    public function changeMessageStatus(int $id): bool
    {
        $message = $this->show($id);
        // dd($message);
        if (!$message) {
            abort(404);
        }
         $message->update(['isSeen' => 1]);
        return true;
    }
}
