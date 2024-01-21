<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreviousInstitute extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'institute_name',
        'institute_address',
        'institute_no',
        'institute_mobile',
        'institute_phone',
        'institute_email',
        'time_period',
        'last_education'
    ];
}