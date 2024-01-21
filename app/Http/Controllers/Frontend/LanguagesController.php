<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LanguagesController extends Controller
{
    public function index($lang)
    {
        if ($lang != 'bn' && $lang != 'en') {
            abort(404);
        }
        app()->setLocale($lang);
        session()->put('locale', $lang);
        return redirect()->back();
    }
}
