<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
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
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
