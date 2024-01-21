<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCollectionDetailsSubHead extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'session_id',
        'student_collection_id',
        'student_collection_details_id',
        'fee_head_id',
        'sub_head_id',
    ];

    public function feeSubHead() {
        return $this->belongsTo(FeeSubHead::class, 'sub_head_id');
    }

    public function feeHead() {
        return $this->belongsTo(FeeHead::class, 'fee_head_id');
    }

    public function collectionDetail()
    {
        return $this->belongsTo(StudentCollectionDetails::class, 'student_collection_details_id');
    }
}
