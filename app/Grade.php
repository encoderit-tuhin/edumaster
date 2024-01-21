<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'grades';

    protected $fillable = ['id', 'grade_name', 'marks_from', 'marks_to', 'point', 'note'];
}
