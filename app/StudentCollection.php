<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCollection extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'class_id',
        'invoice_id',
        'invoice_date',
        'session_id',
        'ledger_id',
        'receive_ledger_id',
        'fund_id',
        'attendance_fine',
        'total_payable',
        'total_paid',
        'total_due',
        'note',
        'created_by',
        'updated_by',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function details()
    {
        return $this->hasMany(StudentCollectionDetails::class, 'student_collection_id');
    }

    public function creator() {
        return $this->belongsTo(User::class, 'created_by');
    }
}
