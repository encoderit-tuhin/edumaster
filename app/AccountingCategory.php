<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountingCategory extends Model
{
    protected $fillable = ['name', 'code', 'type', 'nature'];
}
