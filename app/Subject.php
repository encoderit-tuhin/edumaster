<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{

    use SoftDeletes;

    public function group()
    {
        return $this->belongsTo('App\StudentGroup', 'group_id');
    }

    public static function getCommonSubjects($class_id)
    {
        return Subject::where('class_id', $class_id)
            ->where('group_id', null)
            ->where(function ($query) {
                $query->where('subject_type', 'Compulsory')
                    ->orWhere('subject_type', 'All');
            })
            ->orderBy('sl_no', 'ASC')
            ->get();
    }

    public static function getGroupWiseSubjects($class_id, $group_id)
    {
        return Subject::where('class_id', $class_id)
            ->where('group_id', $group_id)
            ->where(function ($query) {
                $query->where('subject_type', 'Compulsory')
                    ->orWhere('subject_type', 'All');
            })
            ->orderBy('sl_no', 'ASC')
            ->get();
    }

    public static function getCompulsorySubjects($class_id, $group_id)
    {
        $commonSubjectForClass = self::getCommonSubjects($class_id);
        $groupWiseSubjects = self::getGroupWiseSubjects($class_id, $group_id);

        return $commonSubjectForClass->merge($groupWiseSubjects);
    }

    public static function getElectiveOrOptionalSubjects($class_id)
    {
        return Subject::where('class_id', $class_id)
            ->whereIn('group_id', [1, 2, 3])
            ->where(function ($query) {
                $query->where('subject_type', 'Elective')
                    ->orWhere('subject_type', 'Optional')
                    ->orWhere('subject_type', 'Elective_Optional');
            })
            ->orderBy('sl_no', 'ASC')
            ->get();
    }
}
