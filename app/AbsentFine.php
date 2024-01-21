<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AbsentFine extends Model
{
    use HasFactory;

    protected $fillable = ['class_id', 'period_id', 'fee_amount'];

    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }

    public function period()
    {
        return $this->belongsTo(Period::class, 'period_id');
    }
}
