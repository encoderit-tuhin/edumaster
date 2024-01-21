<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeRecord extends Model
{
    use HasFactory;

    protected $fillable = ['academic_year_id', 'student_id', 'fee_head_id', 'fee_sub_head_id'];
}
