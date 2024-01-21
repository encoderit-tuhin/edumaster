<?php

namespace App\Http\Controllers\Frontend;


use Illuminate\Http\Request;
use App\Services\ContactUsService;
use App\Http\Controllers\Controller;


class ContactController extends Controller
{
	public function __construct(
        private readonly ContactUsService $contactService) {
       }

	public function index()
	{
		return view(theme() . '.contact');
	}
	public function store(Request $request)
	{
		$validatedData = $request->validate([
			'name' => 'required|string',
			'email' => 'required|email',
			'phone' => 'required|string',
			'message' => 'required|string',
			'user_id' => 'nullable|integer',
		]);

		$this->contactService->store($validatedData);
		return redirect()->back()->with('success', 'Message send successfully!');
	}
}
