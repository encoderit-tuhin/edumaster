<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesReturn extends Model
{
    use HasFactory;
    protected $fillable = [
        'item_id',
        'price',
        'quantity',
        'total',
        'transaction_date',
        'paidAmount',
        'payment_status',
        'quantity_returned',
        'transaction_id'
    ];
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
