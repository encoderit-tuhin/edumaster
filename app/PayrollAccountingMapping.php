<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayrollAccountingMapping extends Model
{
    use HasFactory;

    protected $fillable=['ledger_id','fund_id'];
}
