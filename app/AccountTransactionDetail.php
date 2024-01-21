<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountTransactionDetail extends Model
{
    protected $fillable = ['account_transactions_id', 'ledger_id', 'debit', 'credit', 'fund_id', 'fund_to_id', 'transaction_date'];


    public function accountTransaction()
    {
        return $this->belongsTo(AccountTransaction::class, 'id');
    }

    public function accountingLedger()
    {
        return $this->belongsTo(AccountingLedger::class, 'ledger_id');
    }
}
