<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use SoftDeletes;

    protected $table = 'teachers';

    protected $fillable = ['id', 'user_id', 'department_id', 'designation', 'sl', 'name', 'gender', 'religion', 'phone', 'birthday', 'blood', 'address', 'joining_date', 'is_administrator', 'is_visible_website'];

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function department()
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }
}
