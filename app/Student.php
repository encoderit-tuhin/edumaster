<?php

namespace App;

use App\StudentSession;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'students';

    protected $fillable = ['user_id', 'parent_id', 'first_name', 'last_name', 'father_name', 'mother_name', 'birthday', 'gender', 'blood_group', 'religion', 'phone', 'address', 'state', 'country', 'register_no', 'group', 'activities', 'remarks'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->select('id', 'name', 'email', 'phone', 'image', 'status');
    }

    public function parent()
    {
        return $this->hasOne(ParentModel::class, 'id', 'parent_id');
    }

    public function studentSession()
    {
        return $this->belongsTo(StudentSession::class, 'id', 'student_id')->with('class');
    }

    public function studentCategory()
    {
        return $this->belongsTo(StudentCategory::class, 'student_category_id', 'id');
    }

    public function studentGroup()
    {
        return $this->belongsTo(StudentGroup::class, 'id');
    }

    public function collections()
    {
        return $this->hasMany(StudentCollection::class, 'student_id');
    }
}
