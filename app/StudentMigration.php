<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMigration extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'type',
        'section_id',
        'group_id',
        'class_id',
        'prev_roll',
        'new_roll',
        'academic_year',
    ];
}
