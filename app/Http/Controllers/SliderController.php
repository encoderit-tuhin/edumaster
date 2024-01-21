<?php

namespace App\Http\Controllers;

use Auth;
use Validator;
use App\Slider;
use App\SliderContent;
use Illuminate\Http\Request;

class SliderController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$sliders = Slider::all()->sortByDesc("id");
		return view('backend.cms.slider.list', compact('sliders'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(Request $request)
	{
		if (!$request->ajax()) {
			return view('backend.cms.slider.create');
		}

		return view('backend.cms.slider.modal.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'title' => 'required',
			'image' => 'image',
		]);

		if ($validator->fails()) {
			if ($request->ajax()) {
				return response()->json(['result' => 'error', 'message' => $validator->errors()->all()]);
			} else {
				return redirect('sliders/create')
					->withErrors($validator)
					->withInput();
			}
		}

		$slider = new Slider();
		$slider->title = $request->input('title');
		$slug = strtolower(preg_replace('/[[:space:]]+/', '-', $request->title));
		$slider->slug = $slug;
		$slider->status = $request->input('status');
		$slider->priority = $request->input('priority');
		if ($request->hasFile('image')) {
			$image = $request->file('image');
			$name = 'slider_image_' . time() . "." . $image->getClientOriginalExtension();
			$destinationPath = public_path('/uploads/media');
			$image->move($destinationPath, $name);
			$slider->image = $name;
		}
		$slider->author_id = Auth::User()->id;
		$slider->save();

		if (!$request->ajax()) {
			return redirect('sliders')->with('success', _lang('Saved Successfully'));
		} else {
			return response()->json(['result' => 'success', 'action' => 'store', 'message' => _lang('Saved Successfully'), 'data' => $slider]);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Request $request, $id)
	{
		$slider = Slider::find($id);
		if (!$slider) {
			return redirect('sliders')->with('success', _lang('Slider already deleted.'));
		}

		if (!$request->ajax()) {
			return view('backend.cms.slider.view', compact('slider', 'id'));
		}

		return view('backend.cms.slider.modal.view', compact('slider', 'id'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Request $request, $id)
	{
		$slider = Slider::find($id);
		if (!$slider) {
			return redirect('sliders')->with('success', _lang('Slider already deleted.'));
		}

		if (!$request->ajax()) {
			return view('backend.cms.slider.edit', compact('slider', 'id'));
		}

		return view('backend.cms.slider.modal.edit', compact('slider', 'id'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$validator = Validator::make($request->all(), [
			'title' => 'required',
			'image' => 'nullable|image',
		]);

		if ($validator->fails()) {
			if ($request->ajax()) {
				return response()->json(['result' => 'error', 'message' => $validator->errors()->all()]);
			}

			return redirect()->route('sliders.edit', $id)
				->withErrors($validator)
				->withInput();
		}

		$slider = Slider::find($id);
		if (!$slider) {
			return redirect('sliders')->with('success', _lang('Slider already deleted.'));
		}

		$slider->title = $request->input('title');
		$slug = strtolower(preg_replace('/[[:space:]]+/', '-', $request->title));
		$slider->slug = $slug;
		$slider->status = $request->input('status');
		$slider->priority = $request->input('priority');

		if ($request->hasFile('image')) {
			$image = $request->file('image');
			$name = 'slider_image_' . time() . "." . $image->getClientOriginalExtension();
			$destinationPath = public_path('/uploads/media');
			$image->move($destinationPath, $name);
			$slider->image = $name;
		}
		$slider->author_id = Auth::User()->id;
		$slider->save();

		if (!$request->ajax()) {
			return redirect('sliders')->with('success', _lang('Updated sucessfully'));
		}

		return response()->json(['result' => 'success', 'action' => 'update', 'message' => _lang('Updated sucessfully'), 'data' => $slider]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$slider = Slider::find($id);
		if (!$slider) {
			return redirect('sliders')->with('success', _lang('Slider already deleted.'));
		}

		$slider->delete();
		return redirect('sliders')->with('success', _lang('Slider deleted.'));
	}
}
