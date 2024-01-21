<?php

namespace App\Http\Controllers;

use App\AssignShift;
use App\Shift;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssignShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::all();
        $shifts = Shift::all();
        $assign_shifts = DB::table('assign_shifts')
        ->join('teachers', 'assign_shifts.teacher_id', '=', 'teachers.id')
        ->join('shifts', 'assign_shifts.shift_id', '=', 'shifts.id')
        ->select('teachers.name as teacher_name', 'shifts.name as shift_name', 'assign_shifts.id as id', 'assign_shifts.teacher_id', 'assign_shifts.shift_id')
        ->get();

        return view('backend.shift_assign.index', compact('teachers', 'shifts', 'assign_shifts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required',
            'shift_id' => 'required',
        ]);

        $teacher_id = $request->teacher_id;
        $shift_id = $request->shift_id;

        DB::beginTransaction();
        try {   
            $exists = AssignShift::where('teacher_id', $teacher_id)
                    ->where('shift_id', $shift_id)
                    ->exists();  
            if($exists)
            {
                return back()->with('error', _lang('Shift Already Added to this teacher'));
            }else{
                $assign_shift = new AssignShift();
                $assign_shift->teacher_id = $teacher_id;
                $assign_shift->shift_id = $shift_id;
                $assign_shift->save();
                DB::commit();
                return redirect()->route('assignshifts.index')->with('success', _lang('Shift Assign successfully Complete'));
            }
        }catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', _lang('Failed to insert records unsuccessfully'));
        }
    }

    public function edit($id)
    {
        $assign_shift = AssignShift::where('id', $id)->first();
        $teachers = Teacher::all();
        $shifts = Shift::all();
        return view('backend.shift_assign.edit', compact('teachers', 'shifts', 'assign_shift'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'teacher_id' => 'required',
            'shift_id' => 'required',
        ]);       

        $teacher_id = $request->teacher_id;
        $shift_id = $request->shift_id;

        $assign_shift = AssignShift::where('id', $id)->first();


        DB::beginTransaction();
        try {
            $assign_shift->teacher_id = $teacher_id;
            $assign_shift->shift_id = $shift_id;
            $assign_shift->update();
            
            DB::commit();
            return redirect()->route('assignshifts.index')->with('success', _lang('Shift Assign Updated successfully'));
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', _lang('Failed to insert records unsuccessfully'));
        }
    }

    public function destroy($id)
    {
        $assign_shift = AssignShift::where('id', $id)->first();
        if(!empty($assign_shift))
        {
            $assign_shift->delete();
            return redirect()->route('assignshifts.index')->with('success', _lang('Shift Assign Remove successfully'));
        }
        else{
            return redirect()->route('assignshifts.index')->with('success', _lang('Something went wrong'));
        }

    }
}
