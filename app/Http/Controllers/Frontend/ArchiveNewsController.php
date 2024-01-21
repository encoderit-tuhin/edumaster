<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use App\Book;
use App\Page;
use App\Post;
use App\Mail\ContactEmail;
use App\Utilities\Overrider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;
use App\Repositories\PostCategoryRepository;
use Illuminate\Support\Facades\Redirect;

class ArchiveNewsController extends Controller
{
    public function __construct(
        private readonly PostRepository $postRepository,
        private readonly PostCategoryRepository $postCategoryRepository
    ) {
        if (env('APP_INSTALLED', true) == true) {
            Redirect::to('login')->send();
        }

        $theme = get_option('active_theme');
        if (file_exists(resource_path() . "/views/theme/$theme/functions.php")) {
            include(resource_path() . "/views/theme/$theme/functions.php");
        }
    }

    public function index()
    {

         $news = $this->postRepository->getPostsByCategory(
            $this->postCategoryRepository->getNewsCategoryId(),
            'publish',
            6
        );
        return view(theme() . '.archive-news', compact('news'));
    }
    public function search(Request $request)
    {
     
        $this->validate($request, [
            'from_date' => 'nullable|date',
            'to_date' => 'nullable|date',
            'searchKeyWord' => 'string',

        ]);
        $news = $this->postRepository->getPostsByCategoryBySearch(
            $this->postCategoryRepository->getNewsCategoryId(),
            'publish',
            $request->from_date,
            $request->to_date,
            $request->searchKeyWord,
        );
     

        return view(theme() . '.archive-news', compact('news'));
    }
}
