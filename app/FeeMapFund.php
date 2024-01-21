<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FeeMapFund extends Model
{
    use HasFactory;

    protected $table = 'fee_map_fund';

    public function feeMaps()
    {
        return $this->belongsToMany(FeeMap::class, 'fee_map_fund', 'fund_id', 'fee_map_id');
    }
}
