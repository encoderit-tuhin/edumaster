<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FeeSubHead extends Model
{
    use HasFactory;

    protected $fillable = ['serial', 'name'];
}
