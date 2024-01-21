<?php

namespace App\Http\Controllers\Frontend;

use App\Club;
use App\Http\Controllers\Controller;

class ClubController extends Controller
{

    public function index()
    {
    }
    public function show($slug)
    {
        $club = Club::where('slug', $slug)->where('status',1)->first();
        if (!$club) {
            abort(404);
        }
        $moderators = $club->moderators;
        $members = $club->members;

        return view(theme() . '.club', compact('club'));
    }
}
