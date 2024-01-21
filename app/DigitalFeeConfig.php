<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DigitalFeeConfig extends Model
{
    use HasFactory;

    protected $fillable = ['bank_account_id', 'ledger_id'];

    public function bankAccount()
    {
        return $this->hasOne(BankAccount::class, 'id', 'bank_account_id');
    }

    public function accountingLedger()
    {
        return $this->hasOne(AccountingLedger::class, 'id', 'ledger_id');
    }
}
