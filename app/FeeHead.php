<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FeeHead extends Model
{
    use HasFactory;

    protected $fillable = ['serial', 'name'];

    protected $with = ['feeSubHeads'];

    public function feeSubHead()
    {
        return $this->belongsTo(FeeMapFeeSubHead::class, 'fee_sub_head_id');
    }

    public function feeSubHeads()
    {
        // In fee_maps table, we have id, fee_head_id
        // In fee_map_fee_sub_head table, we have fee_head_id, fee_sub_head_id
        // from those, get the fee sub head lists
        return $this->belongsToMany(
            FeeSubHead::class,
            'fee_map_fee_sub_head',
            'fee_head_id',
            'fee_sub_head_id'
        )
        ->orderBy('serial', 'asc');
    }
}
