<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    protected $table = 'classes';

    protected $fillable = ['class_name', 'status'];

    public function sections()
    {
        return $this->belongsTo(StudentSession::class, 'id', 'class_id');
    }
}
