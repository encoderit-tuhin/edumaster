<?php

namespace App\Http\Controllers\Frontend;

use App\Staff;
use App\Picklist;
use App\Http\Controllers\Controller;

class StaffsController extends Controller
{
    public function index()
    {
        return view(theme() . '.staffs.index', [
            'staff_departments' => Picklist::where('type', 'Staff Designation')->select('id', 'type', 'value', 'slug')->get(),
        ]);
    }

    public function show($slug)
    {
        $pickList = Picklist::where('slug', $slug)->select('value')->first();

        return view(theme() . '.staffs.show', [
            'staffs' => Staff::where('designation', $pickList->value)->with('user')->select('id', 'user_id', 'name', 'designation')->get(),
        ]);
    }
}
