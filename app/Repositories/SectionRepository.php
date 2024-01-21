<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Section;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class SectionRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return Section::all();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = Section::query();

        // if (isset($filter['search'])) {
        //     $query->where('name', 'like', '%' . $filter['search'] . '%');
        // }

        return $query->paginate($perPage);
    }

    public function create(array $data): ?Section
    {
        return Section::create($data);
    }

    public function update(array $data, int $id)
    {
        return Section::find($id)->update($data);
    }

    public function delete(int $id)
    {
        return Section::destroy($id);
    }

    public function show(int $id)
    {
        return Section::find($id);
    }

    public function getSections()
    {
        return Section::select('id', 'section_name', 'class_id')->get();
    }

    public function getSectionsByClassId(int $id): Collection
    {
        return Section::where('class_id', $id)->select('id', 'class_id', 'section_name')->get();
    }
}
