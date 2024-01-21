<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountingLedger extends Model
{
    protected $fillable = ['ledger_name', 'accounting_category_id', 'accounting_group_id', 'type'];

    public function accountingCategory()
    {
        return $this->belongsTo(AccountingCategory::class, 'accounting_category_id', 'id');
    }

    public function accountingGroup()
    {
        return $this->belongsTo(AccountingGroup::class, 'accounting_group_id', 'id');
    }

    public function digitalFeeConfig()
    {
        return $this->belongsTo(DigitalFeeConfig::class, 'ledger_id', 'id');
    }
}
