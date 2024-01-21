<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsPurchase extends Model
{
    use HasFactory;
    protected $fillable = [
        'sms_gateway',
        'transaction_date',
        'no_of_sms',
        'amount',
        'masking_type'
    ];
}
