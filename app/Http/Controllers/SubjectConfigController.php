<?php

namespace App\Http\Controllers;

use App\ClassModel;
use App\StudentGroup;
use App\Subject;
use App\SubjectConfig;
use App\SubjectConfigDetail;
use Illuminate\Http\Request;

class SubjectConfigController extends Controller
{
    public function create()
    {
        $allClass = ClassModel::select('id', 'class_name')->where('status', 1)->get();
        $allGroup = StudentGroup::select('id', 'group_name')->get();
        $allSubject = Subject::select('id', 'subject_name', 'subject_code', 'subject_type')->get();

        return view('backend.subject_config.create', compact('allClass', 'allGroup', 'allSubject'));
    }

    public function list(Request $request)
    {
        $clasID = $request->class_id;
        $groupID = $request->group_id;

        $subjectConfigs = Subject::select('subject_configs.id', 'subject_configs.class_id', 'subject_configs.group_id', 'subject_configs.subject_id', 'subject_configs.subject_type', 'subject_configs.sr_no', 'subject_configs.merge_config_id', 'subjects.subject_name')
        ->join('subject_configs', 'subject_configs.subject_id', '=', 'subjects.id')
        ->where('subject_configs.class_id', $clasID)
        ->where('subject_configs.group_id', $groupID )
        ->get();

        if(!empty($subjectConfigs)){
            return response()->json([
                'status' => 200,
                'message' => $subjectConfigs,
            ]);
        }else{
            return response()->json([
                'status' => 200,
                'message' => 'Class & Group Wise Subject Not Assigned',
            ]);
        }
    }

    public function store(Request $request)
    {
            if(!empty($request->subjects))
            {
                $classID =  $request->input('class_id');
                $groupID =  $request->input('group_id');
                $subjectExists = [];
                foreach($request->subjects as $subject)
                {
                    $subjectExists['subjects'] = SubjectConfig::where('subject_id', $subject)
                    ->where('class_id', $classID)
                    ->where('group_id',  $groupID)
                    ->get();
                }
                if(count($subjectExists) > 0)
                {
                    return response()->json([
                        'status' => 400,
                        'success' =>  _lang('Subject Already Exists'),
                    ]);
                }else{
                    foreach($request->subjects as $subject)
                    {
                        $subjectConfig = new SubjectConfig();

                        $subjectConfig->class_id = $classID;
                        $subjectConfig->group_id = $groupID;
                        $subjectConfig->subject_id = $subject;
                        $subjectConfig->save();
                    }

                    return response()->json([
                        'status' => 200,
                        'success' =>  _lang('Information has been added'),
                    ]);
                }
            }else{
                return response()->json([
                    'status' => 400,
                    'message' => 'Please Select Subject',
                    'success' =>  _lang('Subject not Set'),
                ]);
            }
    }

    public function update(Request $request)
    {
        if(!empty($request))
        {
            $ids = $request->id;
            $subject_types = $request->subject_type;
            $subject_serials = $request->subject_serial;
            $merge_ids = $request->merge_id;


            for($i=0; $i<count($ids); $i++)
            {
                $update_data = SubjectConfig::where('id', $ids[$i])->first();
                $update_data->subject_type = $subject_types[$i];
                $update_data->sr_no = $subject_serials[$i];
                $update_data->merge_config_id = $merge_ids[$i];
                $update_data->update();
            }

            return response()->json([
                'status' => 200,
                'success' =>   "Data Update Successfully!",
            ]);
           

        }else{
            return response()->json([
                'status' => 400,
                'success' =>  'Data Not Found!',
            ]);
        }
    }
    public function destroy($id)
    {
        $subjectConfig = SubjectConfig::where('id', $id)->first();
        if($subjectConfig){
            $subjectConfig->delete();
            return response()->json([
                'status' => 200,
                'success' => 'Subject Config Delete Successfully',
            ]);

        }else{

            return response()->json([
                'status' => 400,
                'success' => 'Subject Config Not Found',
            ]);

        }

    }
}
