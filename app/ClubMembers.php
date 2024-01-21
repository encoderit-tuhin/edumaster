<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClubMembers extends Model
{
    use HasFactory;
    protected $fillable = ['club_id', 'user_id'];
    public function club()
    {
        return $this->belongsTo(Club::class, 'club_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
