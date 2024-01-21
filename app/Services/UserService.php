<?php

declare(strict_types=1);

namespace App\Services;

use App\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;

class UserService
{
    public function __construct(
        private readonly UserRepository $userRepository
    ) {
    }

    public function getUsers(array $filter = []): LengthAwarePaginator
    {
        return $this->userRepository->paginate(20, $filter);
    }

    public function findUserById(int $id): ?User
    {
        return $this->userRepository->show($id);
    }

    public function createOrUpdateUser(array $data, $id = null): ?User
    {
        $data = $this->prepareForDB($data);

        if ($id === null) {
            return $this->userRepository->create($data);
        } else {
            Log::info('User updated:: ' . $id);
            $result = $this->userRepository->update($data, $id);

            if ($result) {
                return $this->findUserById($id);
            } else {
                return null;
            }
        }
    }

    public function deleteUserById(int $id)
    {
        return $this->userRepository->delete($id);
    }

    public function getUsersByExistType($userType)
    {
        return User::where('user_type', '=', $userType)
            ->get();
    }

    public function getUsersByExcludedType($userType)
    {
        return User::select('id', 'name', 'user_type')
            ->where('user_type', '!=', $userType)
            ->with('userPayroll')
            ->get();
    }

    public function getUsersByExcludedParentAndStudent()
    {
        return User::where('user_type', "!=", "Parent")
            ->where('user_type', "!=", "Student")
            ->orderBy('id', 'DESC')->get();
    }

    public function prepareForDB(array $data)
    {
        $preparedData = [
            'email' => $data['email'] ?? null,
            'phone' => $data['phone'] ?? null,
        ];

        if (!request()->has('form_submit') || request()->input('form_submit') !== "student_id_pass") {
            if (!empty($data['name'])) {
                $preparedData['name'] = $data['name'];
                $preparedData['user_type'] = $data['user_type'];
                $preparedData['role_id'] = 2; // TODO: Why it's 2 ?
                $preparedData['facebook'] = $data['facebook'] ?? '#';
                $preparedData['twitter'] = $data['twitter'] ?? '#';
                $preparedData['linkedin'] = $data['linkedin'] ?? '#';
                $preparedData['google_plus'] = $data['google_plus'] ?? '#';
            } else {
                $preparedData['name'] = $data['first_name'];
                $preparedData['user_type'] = 'Student';
            }
        }

        if (isset($data['password']) && !empty($data['password'])) {
            $preparedData['password_static'] = $data['password'];
            $preparedData['password'] = Hash::make($data['password']);
        }

        if (isset($data['image'])) {
            try {
                if ($data['image']->isValid()) {
                    $image = $data['image'];
                    $ImageName = time() . '.' . $image->getClientOriginalExtension();
                    Image::make($image)->resize(200, 160)->save(base_path('public/uploads/images/students/') . $ImageName);
                    $preparedData['image'] = 'students/' . $ImageName;
                }
            } catch (\Throwable $th) {
                $preparedData['image'] = $data['image'] ?? null;
            }
        }

        return $preparedData;
    }
}
