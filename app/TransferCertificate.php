<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferCertificate extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'reason',
        'issue_date',
        'left_date',
    ];  

    public function student()
    {
        return $this->belongsTo(Student::class)->with('parent','studentSession','user');
    }

    

}
