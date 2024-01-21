<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class BankAccount extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['acc_holder_name', 'bank', 'branch', 'account_no', 'balance'];

    public function digitalFeeConfig()
    {
        return $this->belongsTo(DigitalFeeConfig::class, 'bank_account_id', 'id');
    }
}
