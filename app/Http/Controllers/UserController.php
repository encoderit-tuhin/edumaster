<?php

namespace App\Http\Controllers;

use Exception;
use App\Services\UserService;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Role;

class UserController extends Controller
{
    public function __construct(
        private readonly UserService $userService,
    ) {
        $this->middleware('auth');
    }

    public function index(): View|Factory
    {
        $users = $this->userService->getUsersByExcludedParentAndStudent();

        return view('backend.users.index', compact('users'));
    }

    public function create(): View|Factory
    {
        $roles  = Role::all();
        return view('backend.users.create', compact('roles'));
    }

    public function store(UserCreateRequest $request): Redirector|RedirectResponse
    {
        DB::beginTransaction();
        try {
            $user = $this->userService->createOrUpdateUser($request->validated());

            if ($request->roles && $user) {
                $user->assignRole($request->roles);
            }

            DB::commit();
            return redirect('users')->with('success', _lang('Information has been added'));
        } catch (Exception $e) {
            DB::rollback();
            return redirect('users')->with('error', _lang($e->getMessage()));
        }
    }

    public function show($id): View|Factory
    {
        return view('backend.users.show', [
            'data' => $this->userService->findUserById((int) $id)
        ]);
    }

    public function edit($id): View|Factory
    {
        return view('backend.users.edit', [
            'data' => $this->userService->findUserById((int) $id),
            'roles' => Role::all(),
        ]);
    }

    public function update(UserUpdateRequest $request, $id): Redirector|RedirectResponse
    {
        $user = $this->userService->createOrUpdateUser($request->validated(), (int) $id);

        // Delete roles.
        $user->roles()->detach();

        // Assign new roles.
        if ($request->roles && $user) {
            $user->assignRole($request->roles);
        }

        return redirect('users')->with('success', _lang('Information has been updated'));
    }

    public function destroy($id): Redirector|RedirectResponse
    {
        $this->userService->deleteUserById((int) $id);

        return redirect('users')->with('success', _lang('Information has been deleted'));
    }

    public function get_users($user_type = "")
    {
        if ($user_type != "") {
            $users = $this->userService->getUsersByExistType($user_type);
            return view('backend.sms.others-filter-data', compact('users'));
        }
    }
}
