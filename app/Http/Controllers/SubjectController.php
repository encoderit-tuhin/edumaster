<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($class = '')
    {
        $subjects = Subject::select('*', 'subjects.id AS id')
            ->join('classes', 'classes.id', '=', 'subjects.class_id')
            ->where('subjects.class_id', $class)
            ->orderBy('subjects.id', 'DESC')
            ->get();
        return view('backend.subjects.subject-list', compact('subjects', 'class'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.subjects.subject-add');
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
            'class_id' => 'required',
            'group_id' => 'required',
            'subject_name' => 'required|string|max:191',
            'subject_code' => 'required|string|max:191',
            'subject_short_form' => 'required|string|max:191',
            'subject_type' => 'required',
            'subject_type_form' => 'required',

            // 'full_mark' => 'required|integer',
            // 'pass_mark' => 'required|integer'
        ]);

        if (Subject::where('class_id', $request->class_id)
            ->where('group_id', $request->group_id)
            ->where('subject_code', $request->subject_code)
            ->exists()) {
                return redirect('subjects/create')->with('success', _lang('Subject Already Added For This Code. Please Change Code'));
        } else {
            $subject = new Subject();
            $subject->class_id = $request->class_id;
            $subject->group_id = $request->group_id;
            $subject->subject_name = $request->subject_name;
            $subject->subject_code = $request->subject_code;
            $subject->subject_short_form = $request->subject_short_form;
            $subject->subject_type = $request->subject_type;
            $subject->subject_type_form = $request->subject_type_form;
            $subject->sl_no = $request->sl_no;
            $subject->objective = $request->objective;
            $subject->written = $request->written;
            $subject->practical = $request->practical;
            $subject->full_mark = $request->full_mark;
            $subject->pass_mark = $request->pass_mark;
            $subject->save();
            // return redirect('subjects')->with('success', _lang('Information has been added'));
            $subjects = Subject::where('class_id', $subject->class_id)->orderBy('id', 'DESC')->get();
            $class =  $subject->class_id;
            session()->flash('success', _lang('Information has been added.'));
            return view('backend.subjects.subject-list', compact('subjects', 'class'));
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_subject(Request $request)
    {
        $results = Subject::where('class_id', $request->class_id)->orderBy('id', 'DESC')->get();
        $subjects = '';
        $subjects .= '<option value="">Select One</option>';
        foreach ($results as $data) {
            $subjects .= '<option value="' . $data->id . '">' . $data->subject_name . '</option>';
        }
        return $subjects;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject = Subject::find($id);
        return view('backend.subjects.subject-edit', compact('subject'));
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
        $this->validate($request, [
            'class_id' => 'required',
            'group_id' => 'required',
            'subject_name' => 'required|string|max:191',
            'subject_code' => 'required|string|max:191',
            'subject_short_form' => 'required|string|max:191',
            'subject_type' => 'required',
            'subject_type_form' => 'required',
            // 'full_mark' => 'required|integer',
            // 'pass_mark' => 'required|integer'
        ]);

        $subject = Subject::find($id);
        $subject->class_id = $request->class_id;
        $subject->group_id = $request->group_id;
        $subject->subject_name = $request->subject_name;
        $subject->subject_code = $request->subject_code;
        $subject->subject_short_form = $request->subject_short_form;
        $subject->subject_type = $request->subject_type;
        $subject->subject_type_form = $request->subject_type_form;
        $subject->sl_no = $request->sl_no;
        $subject->objective = $request->objective;
        $subject->written = $request->written;
        $subject->practical = $request->practical;
        $subject->full_mark = $request->full_mark;
        $subject->pass_mark = $request->pass_mark;
        $subject->save();
        // return redirect('subjects')->with('success', _lang('Information has been updated'));

        $subjects = Subject::select('subjects.*','classes.class_name')
        ->join('classes', 'classes.id','=','subjects.class_id')
        ->where('class_id', $subject->class_id)->orderBy('id', 'DESC')->get();
        $class =  $subject->class_id;
        session()->flash('success', _lang('Update Successfully.'));
        return view('backend.subjects.subject-list')->with(['subjects'=>$subjects, 'class'=>$class]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Subject::find($id);
        $subject->delete();
        return redirect('subjects')->with('success', _lang('Information has been deleted'));
    }
}
