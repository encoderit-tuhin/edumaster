<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneBookCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
    ];
}
