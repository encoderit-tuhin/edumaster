<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Leave extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'leave_type',
        'from_date',
        'to_date',
        'reason',
        'status',
        'submit_by',
    ];

    public function student()
    {
        return $this->hasOne('App\Student', 'id', 'student_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'submit_by');
    }
}
