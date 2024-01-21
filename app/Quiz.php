<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'section',
        'group',
        'class',
        'subject_id',
        'quiz1',
        'quiz2',
        'quiz3',
        'quiz4',
    ];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
