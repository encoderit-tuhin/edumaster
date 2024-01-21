<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'shifts';
}
