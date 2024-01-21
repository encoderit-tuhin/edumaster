<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamSubjectMarkConfig extends Model
{
    use HasFactory;
    protected $table = 'exam_subject_mark_configs';
    public $timestamps = true; 
}
