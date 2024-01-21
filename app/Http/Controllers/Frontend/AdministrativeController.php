<?php

namespace App\Http\Controllers\Frontend;

use App\Teacher;
use App\Http\Controllers\Controller;

class AdministrativeController extends Controller
{
    public function index()
    {
        return view(theme() . '.administrative.index', [
            'teachers' => Teacher::where('is_administrator', '1')
                ->where('is_visible_website', '1')
                ->with('user')
                ->select('id', 'user_id', 'name', 'designation')
                ->get(),
        ]);
    }
}