<?php

namespace App\Http\Controllers;

use App\Media;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\SluggableTrait;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Session;

class MediasController extends Controller
{
    use SluggableTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): View|Factory
    {
        Session::put('document_file_type', $request->type);

        if ($request->has('type')) {
            if ($request->type === 'all') {
                $medias = Media::get();
            } else {
                $medias = Media::where('type', $request->type)->get();
            }
        } else {
            $medias = Media::get();
        }

        return view('backend.medias.index', compact('medias'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View|Factory
    {
        return view('backend.medias.create');
    }

    // Function to determine the media type based on MIME type
    private function getTypeFromMimeType($mimeType)
    {
        // Example logic to determine media type based on MIME type
        if (strpos($mimeType, 'image/') === 0) {
            return 'image';
        } elseif (strpos($mimeType, 'audio/') === 0) {
            return 'audio';
        } elseif (strpos($mimeType, 'video/') === 0) {
            return 'video';
        } else {
            return 'document';
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): Redirector|RedirectResponse
    {
        if ($request->url_link) {
            $request->validate([
                'url_link' => 'required|url',
            ]);

            $media = new Media();
            $media->file = $request->url_link;
            $media->uploaded_by = auth()->user()->id;
            $media->type = 'video';
            $media->is_url = '1';
        }

        if ($request->file) {
            $uploadedFile = $request->file('file');
            $fileNameWithoutExtension = pathinfo($request->file_name, PATHINFO_FILENAME);
            $mimeType = $uploadedFile->getMimeType();
            $media = new Media();
            // update file name TODO
            // $media->file = $this->createUniqueSlug($fileNameWithoutExtension, 'medias', 'file') . '.' . $uploadedFile->getClientOriginalExtension();
            $media->file = Str::slug($fileNameWithoutExtension) . '-' . time() . '.' . $uploadedFile->getClientOriginalExtension();
            $media->type = $this->getTypeFromMimeType($mimeType);

            $media->title = $request->title;
            $media->alt_text = $request->alt_text;
            $media->caption = $request->caption;
            $media->description = $request->description;
            $media->uploaded_on = $request->uploaded_on;
            $media->uploaded_by = auth()->user()->id;
            $media->media_category_id = $request->input('category_id');
            $media->media_sub_category_id = $request->input('subcategory_id');
            $media->year = $request->input('year');
            $media->file_name = $request->file_name;
            $media->file_type = $uploadedFile->getClientOriginalExtension();
            $media->file_size = $request->file_size;
            $media->file_url = $request->file_url;
            $media->dimensions = $request->dimensions;
            $destinationPath = public_path('uploads/media_files');
            $uploadedFile->move($destinationPath, $media->file);
        }

        if ($media->save()) {
            return redirect('/medias')->with('success', 'Media uploaded successfully.');
        }

        return redirect('/medias')->with('error', 'Media uploaded unsuccessfully.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_media(Request $request)
    {
        $results = Media::get();
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
        $media = Media::where('id', $id)->first();
        return view('backend.medias.edit', compact('media'));
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
        if ($request->url_link) {
            $request->validate([
                'url_link' => 'required|url',
            ]);

            $media = Media::findOrFail($id);
            $media->file = $request->url_link;
        }

        if ($request->file) {
            $request->validate([
                'file' => 'required|file',
            ]);

            $media = Media::findOrFail($id);
            $oldFilePath = public_path('uploads/media_files/' . $media->file);

            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }

            $media = new Media();
            $uploadedFile = $request->file('file');
            $mimeType = $uploadedFile->getMimeType();
            $destinationPath = public_path('uploads/media_files');

            // update file name TODO

            $fileNameWithoutExtension = pathinfo($request->file_name, PATHINFO_FILENAME);
            $media->file = Str::slug($fileNameWithoutExtension) . '-' . time() . '.' . $uploadedFile->getClientOriginalExtension();
            $uploadedFile->move($destinationPath, $request->file_name);
            $media->type = $this->getTypeFromMimeType($mimeType);
            $media->title = $request->title;
            $media->alt_text = $request->alt_text;
            $media->caption = $request->caption;
            $media->description = $request->description;
            $media->uploaded_on = $request->uploaded_on;
            $media->uploaded_by = auth()->user()->id;
            $media->media_category_id = $request->input('category_id');
            $media->year = $request->input('year');
            $media->file_name = $request->file_name;
            $media->file_type = $uploadedFile->getClientOriginalExtension();
            $media->file_size = $request->file_size;
            $media->file_url = $request->file_url;
            $media->dimensions = $request->dimensions;
        }

        $media->save();

        return redirect('/medias')->with('success', 'Media updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): Redirector|RedirectResponse
    {
        $media = Media::findOrFail($id);
        $oldFilePath = public_path('uploads/media_files/' . $media->file);
        if (file_exists($oldFilePath)) {
            unlink($oldFilePath);
        }
        $media->delete();

        return redirect('/medias')->with('success', _lang('Media deleted.'));
    }
}
