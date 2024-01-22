<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subexam extends Model
{
    use HasFactory;
    protected $fillable = ['exam_id', 'subname','marks'];
    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exam_id');
    }
}
