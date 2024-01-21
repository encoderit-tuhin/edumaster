<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
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
        'transaction_id',
        'quantity_returned'

    ];
    public function customer()
    {
        return $this->belongsTo(Student::class);
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
