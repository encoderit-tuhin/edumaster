<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsBalance extends Model
{
    use HasFactory;
    protected $fillable = [
        'masking_balance',
        'non_masking_balance',];
}
