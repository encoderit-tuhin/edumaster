<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'ip_address', 'action', 'detail', 'previous_detail', 'model', 'model_id', 'url'
    ];
}
