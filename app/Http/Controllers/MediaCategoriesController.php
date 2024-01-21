<?php

namespace App\Http\Controllers;

use App\MediaCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\SluggableTrait;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;


class MediaCategoriesController extends Controller
{
    use SluggableTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($class = ""): View|Factory
    {
        $mediaCategories = MediaCategory::get();

        return view('backend.media_categories.index', compact('mediaCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): Redirector|RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
        ]);

        $mediaCategories = new MediaCategory();
        $mediaCategories->name = $request->name;
        $mediaCategories->slug = $this->createUniqueSlug($request->name, 'media_categories', 'slug');
        $mediaCategories->save();

        if ($mediaCategories->save()) {
            return redirect('media-categories')->with('success', _lang('Media Category added.'));
        }

        return redirect('media-categories')->with('error', _lang('Media Category not added. Please check again.'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_media_categories(Request $request)
    {
        $results = MediaCategory::get();
        return $results;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View|Factory
    {
        $mediaCategory = MediaCategory::where('id', $id)
            ->first();
        return view('backend.media_categories.edit', compact('mediaCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): Redirector|RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required|string|max:191',
        ]);

        $subCategory = $request->subcategory;
        $mediaCategories = MediaCategory::find($id);
        $mediaCategories->name = $request->name;
        $mediaCategories->slug = Str::slug($request->name) . '-' . time();
        $mediaCategories->save();
        $mediaCategories->slug = Str::slug($request->name) . '-' . $mediaCategories->id;
        $mediaCategories->save();

        if ($subCategory) {
            $mediaCategories = new MediaCategory();
            $mediaCategories->parent_media_category_id = $id;
            $mediaCategories->name = $subCategory;
            $mediaCategories->slug = $this->createUniqueSlug($request->name, 'media_categories', 'slug');
            $mediaCategories->save();
        }

        return redirect('media-categories')->with('success', _lang('Media Category updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): Redirector|RedirectResponse
    {
        $mediaCategories = MediaCategory::find($id);
        $mediaCategories->delete();
        return redirect('media-categories')->with('success', _lang('Media Category deleted.'));
    }

    public function getCategories()
    {
        $categories = MediaCategory::whereNull('parent_media_category_id')
            ->select('id', 'name')
            ->get();

        $selectedCategoryID = old('category_id');
        return response()->json(['categories' => $categories, 'selectedCategoryID' => $selectedCategoryID]);
    }

    public function mediaCategoryStore(Request $request)
    {
        // Create Category
        $mediaCategory = new MediaCategory();
        $mediaCategory->name = $request->category;
        $mediaCategory->save();

        // Return the success response
        return response()->json(['message' => 'Category created successfully']);
    }

    public function getSubcategories(Request $request)
    {
        $parentId = intval($request->category_id);

        $subcategories = MediaCategory::where('parent_media_category_id', $parentId)
            ->select('id', 'parent_media_category_id', 'name')
            ->get();


        $selectedSubCategoryID = old('category_id');
        return response()->json(['subcategories' => $subcategories, 'selectedSubCategoryID' => $selectedSubCategoryID]);
    }
}
