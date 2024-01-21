<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    public function members()
    {
        return $this->hasMany(ClubMembers::class, 'club_id');
    }
    public function moderators()
    {
        return $this->hasMany(ClubModerator::class, 'club_id');
    }
}
