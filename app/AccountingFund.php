<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountingFund extends Model
{
    protected $fillable = ['serial', 'name'];

    public function accountingFundsTransactions()
    {
        return $this->hasMany(AccountTransactionDetail::class, 'fund_id');
    }
}
