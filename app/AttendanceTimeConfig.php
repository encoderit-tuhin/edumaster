<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AttendanceTimeConfig extends Model
{
    use HasFactory;

    protected $fillable = [
        'shift',
        'start_time',
        'end_time',
        'delay_time',
        'sms_status',
    ];
}
