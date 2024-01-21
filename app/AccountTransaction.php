<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountTransaction extends Model
{
    protected $fillable = ['category_id', 'voucher_id', 'fund_id', 'transaction_date', 'type', 'reference', 'description', 'created_by'];

    public function transactionDetails()
    {
        return $this->hasMany(AccountTransactionDetail::class, 'account_transactions_id');
    }

    public function accountingCategory()
    {
        return $this->belongsTo(AccountingCategory::class, 'category_id');
    }

    public function accountingFund()
    {
        return $this->belongsTo(AccountingFund::class, 'fund_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
