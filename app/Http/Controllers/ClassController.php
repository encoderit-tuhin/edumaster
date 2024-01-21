<?php

namespace App\Http\Controllers;

use App\Services\ClassService;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\Http\Requests\ClassCreateRequest;

class ClassController extends Controller
{
    public function __construct(private readonly ClassService $classService)
    {
    }

    public function index(): View|Factory
    {
        return view('backend.classes.index', [
            'classes' => $this->classService->getClasses(),
        ]);
    }

    public function store(ClassCreateRequest $request): Redirector|RedirectResponse
    {
        $class = $this->classService->createClass($request->validated());

        if (!$class) {
            return redirect('class')->with('error', _lang('Something went wrong. Class can not be submitted.'));
        }

        return redirect('class')->with('success', _lang('Class application has been submitted.'));
    }

    public function edit($id): View|Factory
    {
        $class = $this->classService->findClassById($id);

        if (!$class) {
            return redirect('class')->with('error', _lang('Something went wrong. Class can not be edit.'));
        }

        return view('backend.classes.edit', [
            'class' => $class
        ]);
    }

    public function update(ClassCreateRequest $request, $id): Redirector|RedirectResponse
    {
        $class = $this->classService->findClassById($id);

        if (!$class) {
            return redirect('class')->with('error', _lang('Something went wrong. Class can not be update.'));
        }

        $this->classService->updateClass($request->validated(), $id);

        return redirect('class')->with('success', _lang('Information has been added'));
    }

    public function destroy($id): Redirector|RedirectResponse
    {
        $class = $this->classService->deleteClassById($id);

        if (!$class) {
            return redirect('class')->with('error', _lang('Something went wrong. Class can not be delete.'));
        }

        return redirect('class')->with('success', _lang('Information has been deleted'));
    }
}
