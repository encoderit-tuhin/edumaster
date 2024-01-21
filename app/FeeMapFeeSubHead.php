<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FeeMapFeeSubHead extends Model
{
    use HasFactory;

    protected $table = 'fee_map_fee_sub_head';

    public function feeMaps()
    {
        return $this->belongsToMany(FeeMap::class, 'fee_map_fee_sub_head', 'fee_sub_head_id', 'fee_map_id');
    }
}
