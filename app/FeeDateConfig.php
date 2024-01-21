<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FeeDateConfig extends Model
{
    use HasFactory;

    protected $fillable = ['fee_sub_head_id', 'payable_date_start', 'payable_date_end'];
}
