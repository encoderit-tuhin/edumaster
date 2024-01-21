<?php

namespace App\Http\Controllers;

use Auth;
use App\Page;
use App\Post;
use App\Media;
use App\Slider;
use App\Mail\ContactEmail;
use App\Utilities\Overrider;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Repositories\PostCategoryRepository;

class WebsiteController extends Controller
{

	public function __construct(
		private readonly PostRepository $postRepository,
		private readonly PostCategoryRepository $postCategoryRepository
	) {
		// if (env('APP_INSTALLED', true) == true) {
		// 	Redirect::to('login')->send();
		// }

		$theme = get_option('active_theme');
		if (file_exists(resource_path() . "/views/theme/$theme/functions.php")) {
			include(resource_path() . "/views/theme/$theme/functions.php");
		}
	}

	public function index($slug = "")
	{
		$home_page = get_option('home_page');

		/** @var Page */
		$homePage = Page::where('slug', 'home')->first();
		$home_page_settings = $homePage->settings(false);
		$home_page_sections = $homePage->sections();

		// Get notices
		$notices = $this->postRepository->getPostsByCategory(
			$this->postCategoryRepository->getNoticeCategoryId(),
			'publish',
			6
		);

		$news = $this->postRepository->getPostsByCategory(
			$this->postCategoryRepository->getNewsCategoryId(),
			'publish',
			6
		);

		$language = Session::has('locale') ? Session::get('locale') : 'en';
		$principalSpeech = $this->getPageDataBySlug('principal-speech', $language);
		$downloadOption = $this->getPageDataBySlug('download-option', $language);
		$coCurriculums = $this->getPageDataBySlug('co-curriculums', $language);
		$studentFacilities = $this->getPageDataBySlug('student-facilities', $language);
		$videoSection = $this->getPageDataBySlug('video-section', $language);
		$bongobondhuSection = $this->getPageDataBySlug('hridoye-bongobondhu', $language);
		$quizCompetition = $this->getPageDataBySlug('quiz-page', $language);



		$sliders = Slider::all()->sortByDesc("id");
		$mujibGalleries = Media::where('media_category_id', 17)->get();
		if ($slug == "" && $home_page == "") {
			return view(theme() . '/index', [
				'notices' => $notices,
				'news' => $news,
				'principalSpeech' => $principalSpeech,
				'bongobondhuSection' => $bongobondhuSection,
				'quizCompetition' => $quizCompetition,
				'sliders' => $sliders,
				'home_page_settings' => $home_page_settings,
				'videoSection' => $videoSection,
				'downloadOption' => $downloadOption,
				'studentFacilities' => $studentFacilities,
				'coCurriculums' => $coCurriculums,
				'mujibGalleries' => $mujibGalleries,
				'home_page_sections' => $home_page_sections,
			]);
		} else {
			if ($slug == "") {
				$page = Page::where("id", $home_page)->first();
			} else {
				$page = Page::where("slug", $slug)->first();
			}
			if ($page) {
				$template = theme() . '.templates.template-' . $page->page_template;

				if ($page->page_template == "default") {
					return view(theme() . '.index', [
						'page' => $page,
						'notices' => $notices,
						'principalSpeech' => $principalSpeech,
						'bongobondhuSection' => $bongobondhuSection,
						'quizCompetition' => $quizCompetition,
						'sliders' => $sliders,
						'home_page_settings' => $home_page_settings,
						'videoSection' => $videoSection,
						'downloadOption' => $downloadOption,
						'studentFacilities' => $studentFacilities,
						'coCurriculums' => $coCurriculums,
						'mujibGalleries' => $mujibGalleries,
						'home_page_sections' => $home_page_sections,
					]);
				}
				return view($template, [
					'page' => $page,
					'notices' => $notices,
					'news' => $news,
					'principalSpeech' => $principalSpeech,
					'bongobondhuSection' => $bongobondhuSection,
					'quizCompetition' => $quizCompetition,
					'sliders' => $sliders,
					'home_page_settings' => $home_page_settings,
					'videoSection' => $videoSection,
					'downloadOption' => $downloadOption,
					'studentFacilities' => $studentFacilities,
					'coCurriculums' => $coCurriculums,
					'mujibGalleries' => $mujibGalleries,
					'home_page_sections' => $home_page_sections,
				]);
			} else {
				return view(theme() . '.404');
			}
		}
	}

	function getPageDataBySlug($slug, $language = 'en')
	{
		return Page::where('slug', $slug)->with(['content', 'author'])
			->first()
			->content
			->filter(function ($content) use ($language) {
				return $content->language === $language;
			})
			->first();
	}
	public function single($slug = "")
	{
		if ($slug == "") {
			return view(theme() . '.404');
		} else {
			$post = Post::where("slug", $slug)->first();
			if ($post) {
				return view(theme() . '.single', compact('post'));
			}
			return view(theme() . '.404');
		}
	}

	public function category_archive($cat_id = "")
	{
		if ($cat_id == "") {
			$category = new \stdClass;
			$category->id = 0;
			$category->category = _lang('Uncategorized');
			return view(theme() . '.post-category', compact('category'));
		} else {
			$category = \App\PostCategory::find($cat_id);
			if ($category) {
				return view(theme() . '.post-category', compact('category'));
			}
			return view(theme() . '.404');
		}
	}

	public function notice($id = "")
	{
		$notice = \App\Notice::join("user_notices", "notices.id", "user_notices.notice_id")
			->select('notices.*')
			->where("user_notices.user_type", "Website")
			->where("notices.id", $id)
			->first();
		return view(theme() . '.single-notice', compact('notice'));
	}

	public function event($id = "")
	{
		$event = \App\Event::where("id", $id)->first();
		return view(theme() . '.single-event', compact('event'));
	}

	public function send_message(Request $request)
	{
		Overrider::load("Settings");

		$this->validate($request, [
			'name' => 'required',
			'email' => 'required|email',
			'subject' => 'required',
			'message' => 'required',
		]);

		$name = $request->input("name");
		$email = $request->input("email");
		$subject = $request->input("subject");
		$message = $request->input("message");

		//Send Email
		$mail = new \stdClass();
		$mail->name = $name;
		$mail->subject = $subject;
		$mail->message = $message;
		Mail::to(get_option('contact_email'))->send(new ContactEmail($mail));

		return redirect()->back()->with('success', _lang('Your Message Send Successfully.'));
	}

	public function notices()
	{
		$notices = $this->postRepository->getPostsByCategory(
			$this->postCategoryRepository->getNoticeCategoryId(),
			'publish',
			6
		);
		return view(theme() . '.notices', [
			'notices' => $notices,

		]);
	}
	public function news()
	{
		$news = $this->postRepository->getPostsByCategory(
			$this->postCategoryRepository->getNewsCategoryId(),
			'publish',
			6
		);
		return view(theme() . '.news', [
			'news' => $news,
		]);
	}
	public function contactPage()
	{

		return view(theme() . '.contact');
	}
	public function loginType($type)
	{
		if ($type != 'teacher' && $type != 'student') {
			abort(404);
		}

		session()->put('login_type', $type);
		return redirect()->route('login');
	}
	public function contactStore(Request $request)
	{
		// Validate the incoming request data (you can customize this as needed)
		$validatedData = $request->validate([
			'name' => 'required|string',
			'email' => 'required|email',
			'phone' => 'required|string',
			'message' => 'required|string',

			'user_id' => 'nullable|integer',
		]);

		// Insert the data into the 'contact_us' table
		DB::table('contact_us')->insert([
			'name' => $validatedData['name'],
			'email' => $validatedData['email'],
			'phone' => $validatedData['phone'],
			'message' => $validatedData['message'],
			'user_id' => 0,
			'created_at' => now(),
			'updated_at' => now(),
		]);

		// Optionally, you can return a response or redirect to a success page
		return redirect()->back()->with('success', 'Message send successfully!');
	}
}
