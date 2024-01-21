<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FeeWaiver extends Model
{
    use HasFactory;

    protected $fillable = ['serial', 'name'];
}
