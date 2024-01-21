<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignShift extends Model
{
    use HasFactory;
    protected $table = 'assign_shifts';

    protected $fillable = ['teacher_id', 'shift_id'];
}
