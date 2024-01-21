<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneBook extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'note',
        'category_id',
    ];
    public function category()
    {
        return $this->belongsTo(PhoneBookCategory::class);
    }
}
