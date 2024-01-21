<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'price',
        'sale_price',
        'current_stock',
        'opening_stock',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(ItemCategory::class, 'category_id');
    }
}