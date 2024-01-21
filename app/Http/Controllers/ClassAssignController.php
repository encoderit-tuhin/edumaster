<?php

namespace App\Http\Controllers;

use App\ClassAssign;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassAssignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class_assigns = DB::table('class_assigns')
        ->join('teachers', 'class_assigns.teacher_id', '=', 'teachers.id')
        ->join('classes', 'class_assigns.class_id', '=', 'classes.id')
        ->select('teachers.name as teacher_name', 'classes.class_name as class_name', 'class_assigns.id as id', 'class_assigns.teacher_id', 'class_assigns.class_id')
        ->get();

        return view('backend.class_assign.index', compact('class_assigns'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required',
            'class_id' => 'required',
        ]);

        $teacher_id = $request->teacher_id;
        $class_id = $request->class_id;

        DB::beginTransaction();
        try {   
            $exists = ClassAssign::where('teacher_id', $teacher_id)
                    ->where('class_id', $class_id)
                    ->exists();  
            if($exists)
            {
                return back()->with('error', _lang('Class Already Added to this teacher'));
            }else{
                $assign_class = new ClassAssign();
                $assign_class->teacher_id = $teacher_id;
                $assign_class->class_id = $class_id;
                $assign_class->save();
                DB::commit();
                return redirect()->route('assignclass.index')->with('success', _lang('Class Assign successfully Complete'));
            }
        }catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', _lang('Failed to insert records unsuccessfully'));
        }
    }

    public function edit($id)
    {
        $assign_class = ClassAssign::where('id', $id)->first();
        // $teachers = Teacher::all();
        // $shifts = Shift::all();
        return view('backend.class_assign.edit', compact('assign_class'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'teacher_id' => 'required',
            'class_id' => 'required',
        ]);       

        $teacher_id = $request->teacher_id;
        $class_id = $request->class_id;

        $assign_class = ClassAssign::where('id', $id)->first();


        DB::beginTransaction();
        try {
            $assign_class->teacher_id = $teacher_id;
            $assign_class->class_id = $class_id;
            $assign_class->update();
            
            DB::commit();
            return redirect()->route('assignclass.index')->with('success', _lang('Class Assign Updated successfully'));
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', _lang('Failed to insert records unsuccessfully'));
        }
    }

    public function destroy($id)
    {
        $assign_class = ClassAssign::where('id', $id)->first();
        if(!empty($assign_class))
        {
            $assign_class->delete();
            return redirect()->route('assignclass.index')->with('success', _lang('Class Assign Remove successfully'));
        }
        else{
            return redirect()->route('assignclass.index')->with('success', _lang('Something went wrong'));
        }

    }
}
