<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentSession extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'student_sessions';

    protected $fillable = ['session_id', 'student_id', 'class_id', 'section_id', 'roll', 'optional_subject'];

    public function student()
    {
        return $this->hasOne(Student::class, 'id', 'student_id')->with('user');
    }

    public function session()
    {
        return $this->hasOne(AcademicYear::class, 'id', 'session_id');
    }

    public function class ()
    {
        return $this->hasOne(ClassModel::class, 'id', 'class_id');
    }

    public function section()
    {
        return $this->hasOne(Section::class, 'id', 'section_id');
    }

    public function optionalSubjectData()
    {
        return $this->hasOne(Subject::class, 'id', 'optional_subject');
    }
}