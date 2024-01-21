<?php

namespace App\Http\Controllers;

use Image;
use App\User;
use App\Teacher;
use App\Department;
use App\UserPayroll;
use App\Traits\Trackable;
use App\Enums\UserLogAction;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\SalaryHeadUserPayroll;
use Illuminate\Validation\Rule;
use App\Services\TeacherService;
use Illuminate\Support\Facades\DB;
use App\Services\SalaryHeadService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Support\Renderable;

class TeacherController extends Controller
{
    use Trackable;

    public function __construct(
        private readonly UserService $userService,
        private readonly SalaryHeadService $salaryHead,
        private readonly TeacherService $teacherService,
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::select(
            '*',
            'teachers.id AS id',
            'teachers.status AS teacher_status',
        )
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->orderBy('teachers.id', 'DESC')->get();
        return view('backend.teachers.teacher-list', compact('teachers'));
    }

    public function create(): Renderable
    {
        return view('backend.teachers.teacher-add', [
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
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'designation' => 'required|string|max:191',
            'birthday' => 'required',
            'gender' => 'required|string|max:191',
            'religion' => 'required|string|max:191',
            'phone' => 'required|string|max:191',
            'sl' => 'nullable|integer',
            'blood' => 'nullable|string',
            'address' => 'required',
            'email' => 'required|string|max:191|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'image' => 'nullable|image|max:5120',
        ]);

        $ImageName = 'profile.png';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ImageName = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(400, 400)->save(base_path('public/uploads/images/teachers/') . $ImageName);
        }


        DB::beginTransaction();
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->password_static = $request->password;
            $user->user_type = 'Teacher';
            $user->phone = $request->phone;
            $user->image = 'teachers/' . $ImageName;

            if ($user->save()) {
                if ($user) {
                    $model_id = $user->id;
                    $detail = 'user create';
                    $this->trackAction(UserLogAction::CREATE, User::class, $model_id, $detail);
                }

                $teacher = new Teacher();
                $teacher->user_id = $user->id;
                $teacher->name = $request->name;
                $teacher->designation = $request->designation;
                $teacher->department_id = $request->department_id;
                $teacher->birthday = $request->birthday;
                $teacher->gender = $request->gender;
                $teacher->religion = $request->religion;
                $teacher->phone = $request->phone;
                $teacher->blood = $request->blood;
                $teacher->sl = $request->sl;
                $teacher->address = $request->address;
                $teacher->joining_date = $request->joining_date;
                $teacher->is_administrator = $request->is_administrator ?? '0';

                if ($teacher->save()) {
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

                if ($teacher) {
                    $model_id = $teacher->id;
                    $detail = 'teacher create';
                    $this->trackAction(UserLogAction::CREATE, Teacher::class, $model_id, $detail);
                }
            }

            DB::commit();
            return redirect('teachers')->with('success', _lang('Teacher created.'));
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('teachers')->with('error', _lang('Teacher created unsuccessful.'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher = Teacher::select(
            '*',
            'teachers.id AS id',
        )
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('teachers.id', intval($id))
            ->first();
        return view('backend.teachers.teacher-view', compact('teacher'));
    }

    public function edit($id): Renderable
    {
        $teacher = Teacher::select(
            'teachers.*',
            'users.*',
            'teachers.id AS id',
        )
            ->join('users', 'users.id', '=', 'teachers.user_id')
            ->where('teachers.id', intval($id))
            ->first();

        if (!$teacher) {
            return redirect('teachers')->with('success', _lang('Teacher already deleted.'));
        }

        return view('backend.teachers.edit', [
            'teacher' => $teacher,
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
    public function update(Request $request, $id)
    {
        $teacher = Teacher::find($id);
        if (!$teacher) {
            return redirect('teachers')->with('success', _lang('Teacher already deleted.'));
        }

        $this->validate($request, [
            'name' => 'required|string|max:191',
            'designation' => 'required|string|max:191',
            'birthday' => 'required',
            'gender' => 'required|string|max:191',
            'religion' => 'required|string|max:191',
            'phone' => 'required|string|max:191',
            // 'address' => 'required',
            'sl' => 'nullable|integer',
            'blood' => 'nullable|string',
            'email' => [
                'required',
                Rule::unique('users')->ignore($teacher->user_id),
            ],
            'password' => 'nullable|min:6|confirmed',
            'image' => 'nullable|image|max:5120',
            'attachment' => 'nullable|file|mimes:doc,pdf,docx,zip|max:2048',
            'exp_attachment' => 'nullable|file|mimes:doc,pdf,docx,zip|max:2048',
            'trainging_attachment' => 'nullable|file|mimes:doc,pdf,docx,zip|max:2048',
        ]);

        try {
            $teacher->name = $request->name;
            $teacher->designation = $request->designation;
            $teacher->department_id = $request->department_id;
            $teacher->birthday = $request->birthday;
            $teacher->gender = $request->gender;
            $teacher->religion = $request->religion;
            $teacher->phone = $request->phone;
            $teacher->blood = $request->blood;
            $teacher->sl = $request->sl;
            $teacher->address = $request->address;
            $teacher->joining_date = $request->joining_date;
            $teacher->is_administrator = $request->is_administrator ?? '0';

            $teacher->marital_status = $request->marital_status;
            $teacher->mobile_no = $request->mobile_no;

            $teacher->resign_date = $request->resign_date;
            $teacher->resign_note = $request->resign_note;
            $teacher->category = $request->category;
            $teacher->father_name = $request->father_name;
            $teacher->nationality = $request->nationality;
            $teacher->mother_name = $request->mother_name;
            $teacher->national_id = $request->national_id;
            $teacher->spouse_name = $request->spouse_name;
            $teacher->passport_no = $request->passport_no;
            $teacher->no_of_child = $request->no_of_child;
            $teacher->tin_no = $request->tin_no;
            $teacher->specialization = $request->specialization;
            $teacher->mpo_id = $request->mpo_id;
            $teacher->hobby = $request->hobby;
            $teacher->index_no = $request->index_no;
            $teacher->language = $request->language;
            $teacher->extra_curriculum = $request->extra_curriculum;
            $teacher->permanent_address = $request->permanent_address;

            $teacher->education = $request->education;
            $teacher->cgpa_gpa = $request->cgpa_gpa;
            $teacher->institute_name = $request->institute_name;
            $teacher->out_of_cgpa_gpa = $request->out_of_cgpa_gpa;
            $teacher->board = $request->board;
            $teacher->passing_year = $request->passing_year;
            $teacher->group = $request->group;
            $teacher->edu_duration = $request->edu_duration;
            $teacher->subject = $request->subject;
            $teacher->achivement = $request->achivement;
            $teacher->marks = $request->marks;
            $teacher->division_grade = $request->division_grade;

            if ($request->hasFile('attachment')) {
                $file = $request->file('attachment');
                $file_name = time() . rand(1, 999) . '.' . $file->getClientOriginalExtension();
                $file->move(base_path('public/uploads/files/edu_document/'), $file_name);
                $teacher->attachment = 'teachers/' . $file_name;
            }

            $teacher->organization_name = $request->organization_name;
            $teacher->exp_joining_date = $request->exp_joining_date;
            $teacher->exp_resign_date = $request->exp_resign_date;
            $teacher->organization_type = $request->organization_type;
            $teacher->exp_designation = $request->exp_designation;
            $teacher->exp_duration = $request->exp_duration;
            $teacher->exp_department = $request->exp_department;
            $teacher->location = $request->location;
            $teacher->responsibility = $request->responsibility;

            if ($request->hasFile('exp_attachment')) {
                $file = $request->file('exp_attachment');
                $file_name = time() . rand(1, 999) . '.' . $file->getClientOriginalExtension();
                $file->move(base_path('public/uploads/files/experiance_document/'), $file_name);
                $teacher->exp_attachment = 'teachers/' . $file_name;
            }

            $teacher->training_title = $request->training_title;
            $teacher->trainging_location = $request->trainging_location;
            $teacher->trainging_institute = $request->trainging_institute;
            $teacher->trainging_country = $request->trainging_country;
            $teacher->trainging_topic = $request->trainging_topic;
            $teacher->trainging_achivement = $request->trainging_achivement;
            $teacher->trainging_duration = $request->trainging_duration;
            $teacher->trainging_note = $request->trainging_note;
            $teacher->trainging_join_date = $request->trainging_join_date;
            $teacher->trainging_end_date = $request->trainging_end_date;

            if ($request->hasFile('trainging_attachment')) {
                $file = $request->file('trainging_attachment');
                $file_name = time() . rand(1, 999) . '.' . $file->getClientOriginalExtension();
                $file->move(base_path('public/uploads/files/training_document/'), $file_name);
                $teacher->trainging_attachment = 'teachers/' . $file_name;
            }

            $teacher->bank_account_name = $request->bank_account_name;
            $teacher->bank_account_number = $request->bank_account_number;
            $teacher->bank_status = $request->bank_status;
            $teacher->bank_name = $request->bank_name;
            $teacher->bank_account_type = $request->bank_account_type;
            $teacher->bank_account_branch = $request->bank_account_branch;

            $teacher->reference_name = $request->reference_name;
            $teacher->reference_organization = $request->reference_organization;
            $teacher->reference_designation = $request->reference_designation;
            $teacher->reference_relation = $request->reference_relation;
            $teacher->reference_mobile = $request->reference_mobile;
            $teacher->reference_address = $request->reference_address;
            $teacher->reference_email = $request->reference_email;
            $teacher->save();

            if ($teacher) {
                $model_id = $teacher->id;
                $detail = 'teacher update';
                $this->trackAction(UserLogAction::UPDATE, Teacher::class, $model_id, $detail);
            }

            $user = User::find($teacher->user_id);
            if ($user) {
                $user->name = $request->name;
                $user->email = $request->email;
                $user->phone = $request->phone;
                if ($request->password) {
                    $user->password = Hash::make($request->password);
                    $user->password_static = $request->password;
                }
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $ImageName = time() . '.' . $image->getClientOriginalExtension();
                    Image::make($image)->resize(400, 400)->save(base_path('public/uploads/images/teachers/') . $ImageName);
                    $user->image = 'teachers/' . $ImageName;
                }
                $user->save();

                if ($user) {
                    $model_id = $user->id;
                    $detail = 'user update';
                    $this->trackAction(UserLogAction::UPDATE, User::class, $model_id, $detail);
                }
            }

            return redirect('teachers')->with('success', _lang('Information has been updated.'));
        } catch (\Throwable $th) {
            return back()->with('error', _lang('Something went wrong, please try again.'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateTeacherStatus(Request $request)
    {
        $userId = intval($request->id);

        $user = User::find($userId);
        if (!$user) {
            return redirect('teachers')->with('success', _lang('User already deleted.'));
        }

        $user->status = $request->status;
        $user->save();
        return redirect('teachers')->with('success', _lang('Information has been updated'));
    }

    public function destroy($id)
    {
        $teacher = Teacher::find($id);
        $user = User::find($teacher->user_id);

        if (!$teacher & !$user) {
            return back()->with('success', _lang('Something wrong.'));
        }

        if ($teacher) {
            $model_id = $teacher->id;
            $detail = 'teacher delete';
            $this->trackAction(UserLogAction::DELETE, Teacher::class, $model_id, $detail);
        }

        if ($user) {
            $model_id = $user->id;
            $detail = 'user delete';
            $this->trackAction(UserLogAction::DELETE, User::class, $model_id, $detail);
        }

        $user->delete();
        $teacher->delete();

        return back()->with('success', _lang('Information has been deleted'));
    }

    public function teacherList()
    {
        $teachers = Teacher::where('status', '=', '1')->get();

        if ($teachers->count() > 0) {
            return view('backend.teachers.teacher-list-report', compact('teachers'));
        } else {
            return back()->with('error', _lang('No data found'));
        }
    }

    public function statusEnable($id)
    {
        $teacher = $this->teacherService->findTeacherById((int) $id);
        if ($teacher) {
            $teacher->status = '1';
            $teacher->save();

            $user = $this->userService->findUserById($teacher->user_id);
            $user->user_status = '1';
            $user->save();

            return back()->with('success', _lang('Teacher Enable Successfully.'));
        }
    }

    public function statusDisable($id)
    {
        $teacher = $this->teacherService->findTeacherById((int) $id);
        if ($teacher) {
            $teacher->status = '0';
            $teacher->save();

            $user = $this->userService->findUserById($teacher->user_id);
            $user->user_status = '0';
            $user->save();

            return back()->with('error', _lang('Teacher Disable Successfully.'));
        }
    }
}
