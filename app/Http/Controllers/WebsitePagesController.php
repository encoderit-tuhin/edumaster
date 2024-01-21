<?php

namespace App\Http\Controllers;

use App\Page;
use App\Picklist;
use App\Department;
use Illuminate\Support\Facades\Session;

class WebsitePagesController extends Controller
{
    public function show($slug)
    {
        $page = Page::where('slug', $slug)->with(['content', 'author'])->first();
        if (!$page) {
            abort(404);
        }

        $language = Session::has('locale') ? Session::get('locale') : 'en';

        $page->data = $page->content->filter(function ($content) use ($language) {
            return $content->language === $language;
        })->first();

        return view($this->getPageTemplateBladeFile($page), compact('page'));
    }

    private function getPageTemplateBladeFile($page): string
    {
        $pageTemplate = theme() . '.show';
        switch ($page->slug) {
            case 'principal-speech':
                return theme() . '.principal-speech';

            default:
                return $pageTemplate;
        }
    }

    public function mission()
    {
        return view(theme() . '.mission');
    }

    public function motto()
    {
        return view(theme() . '.motto');
    }

    public function principle_message()
    {
        return view(theme() . '.principle_message');
    }

    public function vision()
    {
        return view(theme() . '.vision');
    }
    public function objectives()
    {
        return view(theme() . '.objectives');
    }
    public function post_category()
    {
        return view(theme() . '.post_category');
    }
    public function history_ndcm()
    {
        return view(theme() . '.history_ndcm');
    }
    public function explanation_nomenclature()
    {
        return view(theme() . '.explanation_nomenclature');
    }
    public function goal()
    {
        return view(theme() . '.goal');
    }

    public function admission_info()
    {
        return view(theme() . '.admission_info');
    }

    public function academic_achivement()
    {
        return view(theme() . '.academic_achivement');
    }
    public function academic_facilities()
    {
        return view(theme() . '.academic_facilities');
    }
    public function debating_club()
    {
        return view(theme() . '.debating_club');
    }
    public function cultural_club()
    {
        return view(theme() . '.cultural_club');
    }
    public function science_club()
    {
        return view(theme() . '.science_club');
    }
    public function volunteer_alliance()
    {
        return view(theme() . '.volunteer_alliance');
    }
    public function business_club()
    {
        return view(theme() . '.business_club');
    }
    public function humaneties_club()
    {
        return view(theme() . '.humaneties_club');
    }
    public function english_club()
    {
        return view(theme() . '.english_club');
    }
    public function nature_club()
    {
        return view(theme() . '.nature_club');
    }
    public function photography_club()
    {
        return view(theme() . '.photography_club');
    }
    public function math_club()
    {
        return view(theme() . '.math_club');
    }

    public function departments()
    {
        return view(theme() . '.departments', [
            'departments' => Department::select('department_name')->get(),
        ]);
    }

    public function staffDepartments()
    {
        return view(theme() . '.staff_departments', [
            'staff_departments' => Picklist::where('type', 'Staff Designation')->select('id', 'type', 'value')->get(),
        ]);
    }
}