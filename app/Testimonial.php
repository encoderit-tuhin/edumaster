<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_name',
        'board_name',
        'issue_date',
        'passing_year',
        'session',
        'board_roll_no',
        'board_reg_no',
        'gpa',
        'grade',
        'student_id'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
