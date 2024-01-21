<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectConfig extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'class_id',
        'group_id',
        'subject_id',
    ];
}
