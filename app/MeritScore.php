<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeritScore extends Model
{
    protected $fillable=[
        'class_id',
        'student_id',
        'section_id',
        'session_id',
        'score'
    ];
    use HasFactory;
}
