<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentResultReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'roll_no',
        'name',
        'group',
        'category',
        'gender',
        'date_of_birth',
        'religion',
        'fathers_name',
        'mothers_name',
        'mobile_no',
    ];
}
