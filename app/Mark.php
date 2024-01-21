<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'marks';
	protected $fillable = array('exam_id','subject_id', 'student_id', 'class_id', 'section_id','session_id','group_id','paper_id');

    public function markDetails(){
        return $this->hasMany(MarkDetails::class, 'mark_id');
    }

    public function student()
    {
        return $this->hasOne(Student::class, 'id', 'student_id')->with('user');
    }
}