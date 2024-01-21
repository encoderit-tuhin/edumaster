<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'author',
        'code',
        'rack_no',
        'quantity',
        'description',
        'photo',
        'barcode',
        'scheme_no',
        'call_no',
        'writer_name',
        'book_copy_no',
        'publisher',
        'publish_date',
        'version',
        'price',
        'supplier',
        'total_page',
        'identify_page',
        'date',
        'asset_no',
    ];

    public function bookCategory()
    {
        return $this->belongsTo(BookCategory::class, 'category_id', 'id');
    }
}
