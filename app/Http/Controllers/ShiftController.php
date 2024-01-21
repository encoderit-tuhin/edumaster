<?php

namespace App\Http\Controllers;

use App\Shift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShiftController extends Controller
{
    public function index()
    {
        $shifts = Shift::orderBy('id', 'desc')->get();
        return view('backend.shift.index', compact('shifts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        DB::beginTransaction();
        try {         
            $shift = new Shift();
            $shift->name = $request->name;
            $shift->save();
            DB::commit();
            return redirect()->route('shift.index')->with('success', _lang('Shift Created successfully'));
        }catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', _lang('Failed to insert records unsuccessfully'));
        }
    }

    public function edit($id)
    {
        $shift = Shift::where('id', $id)->first();

        return view('backend.shift.edit', compact('shift'));

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $shift = Shift::where('id', $id)->first();

        DB::beginTransaction();
        try {
            $shift->name = $request->name;
            $shift->update();
            DB::commit();
            return redirect()->route('shift.index')->with('success', _lang('Shift Updated successfully'));
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', _lang('Failed to insert records unsuccessfully'));
        }

    }

    public function destroy($id)
    {
        $shift = Shift::where('id', $id)->first();
        if(!empty($shift))
        {
            $shift->delete();
            return redirect()->route('shift.index')->with('success', _lang('Shift Remove successfully'));
        }
        else{
            return redirect()->route('shift.index')->with('success', _lang('Something went wrong'));
        }

    }
}
