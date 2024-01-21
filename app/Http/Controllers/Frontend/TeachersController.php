<?php

namespace App\Http\Controllers\Frontend;

use App\Teacher;
use App\Department;
use App\Http\Controllers\Controller;

class TeachersController extends Controller
{
    public function index()
    {
        return view(theme() . '.teachers.index', [
            'departments' => Department::select('id', 'slug', 'department_name')->get(),
        ]);
    }

    public function show($slug)
    {
        $departmentId = Department::where('slug', $slug)->select('id')->first();
        if ($departmentId) {
            return view(theme() . '.teachers.show', [
                'teachers' => Teacher::where('department_id', $departmentId->id)
                    ->where('is_visible_website', '1')
                    ->with('user')
                    ->select('id', 'user_id', 'name', 'designation')
                    ->get(),
            ]);
        }
    }
}