<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'id',
        'section_name',
        'room_no',
        'class_id',
        'class_teacher_id',
        'status',
        'rank',
        'capacity',
    ];

    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id', 'id');
    }

    public function shift()
    {
        return $this->belongsTo(AttendanceTimeConfig::class, 'attendance_time_config_id', 'id');
    }

    public function students()
    {
        return $this->hasMany(StudentSession::class, 'section_id');
    }
}
