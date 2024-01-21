<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FeeMap extends Model
{
    use HasFactory;

    protected $fillable = ['fee_head_id', 'ledger_id', 'fund', 'type'];

    public function feeHead()
    {
        return $this->belongsTo(FeeHead::class, 'fee_head_id');
    }

    public function feeLedger()
    {
        return $this->belongsTo(AccountingLedger::class, 'ledger_id');
    }

    public function feeSubHeads()
    {
        return $this->belongsToMany(FeeSubHead::class, 'fee_map_fee_sub_head', 'fee_map_id', 'fee_sub_head_id');
    }

    public function funds()
    {
        return $this->belongsToMany(FeeMapFund::class, 'fee_map_fund', 'fee_map_id', 'fund_id');
    }
}
