<?php

namespace App\Http\Controllers\Frontend;

use App\Media;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    public function imageIndex()
    {
        $medias = Media::get();

        $imageMedias = $medias->filter(function ($media) {
            return $media->type === 'image';
        });

        $groupedMedias = $imageMedias->groupBy(function ($media) {
            return strtoupper($media->year);
        })->sortBy(function ($images, $year) {
            return $year;
        });

        return view(theme() . '.gallery.image-gallery', compact('groupedMedias'));
    }

    public function imageYear($year)
    {
        $medias = Media::where('year', $year)->with('mediaSubCategory')->get();
        return view(theme() . '.gallery.image-gallery-subcategory', compact('medias'));
    }

    public function videoIndex()
    {
        $medias = Media::where('is_url', '1')->get();
        return view(theme() . '.gallery.video-gallery', compact('medias'));
    }
}
