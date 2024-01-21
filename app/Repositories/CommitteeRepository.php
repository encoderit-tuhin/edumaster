<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Interfaces\BaseRepositoryInterface;
use App\Committee;
use Image;

class CommitteeRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return Committee::all();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = Committee::query();

        // if (isset($filter['search'])) {
        //     $query->where('name', 'like', '%' . $filter['search'] . '%');
        // }

        $query->join('Committee_types', 'Committee_types.id', '=', 'Committees.Committee_type')
            ->select('Committees.*', 'Committee_types.name as Committee_type_name');

        return $query->paginate($perPage);
    }

    public function create($data): ?Committee
    {
        $ImageName = 'profile.png';
        if ($data['photo']) {
            $image = $data['photo'];
            $ImageName = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(400, 400)->save(public_path('uploads/images/committee/') . $ImageName);
        }

        $committee = new Committee();
        $committee->name = $data['name'];
        $committee->phone = $data['phone'];
        $committee->post = $data['post'];
        $committee->address = $data['address'];
        $committee->year_from = $data['year_from'];
        $committee->year_to = $data['year_to'];
        $committee->photo = 'uploads/images/committee/' . $ImageName;
        // dd($committee);
        $committee->save();
        return $committee;
    }

    public function update(array $data, $id): ?bool
    {

        $committee = Committee::find($id);
        if ($committee) {
            if (isset($data['photo'])) {
                if (file_exists(public_path($committee->photo))) {
                    
                    unlink(public_path( $committee->photo));
                }
                $image = $data['photo'];
                $ImageName = time() . '.' . $image->getClientOriginalExtension();
                $imgPath = 'uploads/images/committee/' . $ImageName;
               
                Image::make($image)->resize(400, 400)->save(public_path('uploads/images/committee/') . $ImageName);
            } 

            $committee->name = $data['name'];
            $committee->phone = $data['phone'];
            $committee->post = $data['post'];
            $committee->address = $data['address'];
            $committee->year_from = $data['year_from'];
            $committee->year_to = $data['year_to'];
            $committee->photo =$imgPath ?? $committee->photo;
            // dd($committee);
            $committee->save();
            return true;
        }
        return false;
    }

    public function show($id): ?Committee
    {
        $committee = Committee::find($id);
        if ($committee) {
            return $committee;
        }

        return false;
    }
    public function delete($id): ?bool
    {
        Committee::destroy($id);
        return true;
    }
}
