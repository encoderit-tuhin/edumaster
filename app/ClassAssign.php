<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassAssign extends Model
{
    use HasFactory;
    protected $table = 'class_assigns';

    protected $fillable = ['teacher_id', 'class_id'];
}
