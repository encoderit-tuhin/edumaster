<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'exams';
    protected $fillable = ['exam_code', 'name'];
    public function subexam(){
        return $this->hasOne(Subexam::class);
    }
}