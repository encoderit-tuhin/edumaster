<?php

namespace App\Http\Controllers;


use App\User;
use App\Staff;
use App\Department;
use App\UserPayroll;
use App\Traits\Trackable;
use App\Enums\UserLogAction;
use Illuminate\Http\Request;
use App\SalaryHeadUserPayroll;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use App\Services\SalaryHeadService;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Intervention\Image\Facades\Image;
use Illuminate\Contracts\View\Factory;
use App\Http\Requests\StaffCreateRequest;
use App\Http\Requests\StaffUpdateRequest;
use Illuminate\Contracts\Support\Renderable;

class StaffController extends Controller
{
    use Trackable;

    public function __construct(
        private readonly SalaryHeadService $salaryHead
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View|Factory
    {
        $staffs = Staff::select(
            '*',
            'staffs.id AS id',
        )
            ->join('users', 'users.id', '=', 'staffs.user_id')
            ->orderBy('staffs.id', 'DESC')->get();
        return view('backend.staffs.staff-list', compact('staffs'));
    }

    public function create(): Renderable
    {
        return view('backend.staffs.staff-add', [
            'bloods' => get_blood_groups(),
            'departments' => Department::select('id', 'department_name')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StaffCreateRequest $request): Redirector | RedirectResponse
    {
        $ImageName = 'profile.png';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ImageName = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(400, 400)->save(base_path('public/uploads/images/staffs/') . $ImageName);
        }

        DB::beginTransaction();
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->password_static = $request->password;
            $user->user_type = 'Staff';
            $user->phone = $request->phone;
            $user->image = 'staffs/' . $ImageName;

            if ($user->save()) {
                if ($user) {
                    $model_id = $user->id;
                    $detail = 'user create';
                    $this->trackAction(UserLogAction::CREATE, User::class, $model_id, $detail);
                }

                $staff = new Staff();
                $staff->user_id = $user->id;
                $staff->name = $request->name;
                $staff->designation = $request->designation;
                $staff->department_id = $request->department_id;
                $staff->birthday = $request->birthday;
                $staff->gender = $request->gender;
                $staff->religion = $request->religion;
                $staff->phone = $request->phone;
                $staff->blood = $request->blood;
                $staff->sl = $request->sl;
                $staff->address = $request->address;
                $staff->joining_date = $request->joining_date;

                if ($staff->save()) {
                    $userPayroll = new UserPayroll([
                        'user_id' => $user->id,
                        'net_salary' => 0,
                    ]);
                    $userPayroll->save();

                    $salaryHeads = $this->salaryHead->getSalaryHeads();

                    foreach ($salaryHeads as $salaryHead) {
                        $salaryHeadUserPayroll = new SalaryHeadUserPayroll([
                            'user_payroll_id' => $userPayroll->id,
                            'salary_head_id' => $salaryHead->id,
                            'amount' => 0,
                        ]);
                        $salaryHeadUserPayroll->save();
                    }
                }

                if ($staff) {
                    $model_id = $staff->id;
                    $detail = 'staff create';
                    $this->trackAction(UserLogAction::CREATE, Staff::class, $model_id, $detail);
                }
            }

            DB::commit();
            return redirect('staffs')->with('success', _lang('Staff created.'));
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('staffs')->with('error', _lang('Staff created unsuccessful.'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View|Factory
    {
        $staff = Staff::select(
            '*',
            'staffs.id AS id',
        )
            ->join('users', 'users.id', '=', 'staffs.user_id')
            ->where('staffs.id', intval($id))
            ->first();
        return view('backend.staffs.staff-view', compact('staff'));
    }

    public function edit($id): Renderable
    {
        $staff = Staff::select(
            '*',
            'staffs.id AS id',
        )
            ->join('users', 'users.id', '=', 'staffs.user_id')
            ->where('staffs.id', intval($id))
            ->first();

        if (!$staff) {
            return redirect('staffs')->with('success', _lang('Staff already deleted.'));
        }

        return view('backend.staffs.staff-edit', [
            'staff' => $staff,
            'bloods' => get_blood_groups(),
            'departments' => Department::select('id', 'department_name')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StaffUpdateRequest $request, $id): Redirector|RedirectResponse
    {
        $staff = Staff::find($id);
        if (!$staff) {
            return redirect('staffs')->with('success', _lang('Staff already deleted.'));
        }

        $this->validate($request, [
            'email' => [
                'required',
                Rule::unique('users')->ignore($staff->user_id),
            ],
        ]);

        $staff->name = $request->name;
        $staff->designation = $request->designation;
        $staff->department_id = $request->department_id;
        $staff->birthday = $request->birthday;
        $staff->gender = $request->gender;
        $staff->religion = $request->religion;
        $staff->phone = $request->phone;
        $staff->blood = $request->blood;
        $staff->sl = $request->sl;
        $staff->address = $request->address;
        $staff->joining_date = $request->joining_date;
        $staff->save();

        if ($staff) {
            $model_id = $staff->id;
            $detail = 'staff update';
            $this->trackAction(UserLogAction::UPDATE, Staff::class, $model_id, $detail);
        }

        $user = User::find($staff->user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ImageName = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(400, 400)->save(base_path('public/uploads/images/staffs/') . $ImageName);
            $user->image = 'staffs/' . $ImageName;
        }
        $user->save();

        if ($user) {
            $model_id = $user->id;
            $detail = 'user update';
            $this->trackAction(UserLogAction::UPDATE, User::class, $model_id, $detail);
        }

        return redirect('staffs')->with('success', _lang('Staff Information has been updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStaffStatus(Request $request): Redirector|RedirectResponse
    {
        $userId = intval($request->id);

        $user = User::find($userId);
        if (!$user) {
            return redirect('staffs')->with('success', _lang('User already deleted.'));
        }

        $user->status = $request->status;
        $user->save();
        return redirect('staffs')->with('success', _lang('Staff Information has been updated'));
    }

    public function destroy($id): Redirector|RedirectResponse
    {
        $staff = Staff::find($id);
        $user = User::find($staff->user_id);

        if (!$staff & !$user) {
            return redirect('staffs')->with('error', _lang('Something wrong.'));
        }

        if ($staff) {
            $model_id = $staff->id;
            $detail = 'staff delete';
            $this->trackAction(UserLogAction::DELETE, Staff::class, $model_id, $detail);
        }

        if ($user) {
            $model_id = $user->id;
            $detail = 'user delete';
            $this->trackAction(UserLogAction::DELETE, User::class, $model_id, $detail);
        }

        $user->delete();
        $staff->delete();

        return redirect('staffs')->with('success', _lang('Staff Information has been deleted'));
    }
}
