<?php

namespace App\Http\Controllers\Frontend;

use App\Section;
use App\ClassModel;
use App\ClassRoutine;
use App\Services\RoutineService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;

class FrontendClassRoutineController extends Controller
{
    public function __construct(private readonly RoutineService $routineService)
    {
    }

    public function index()
    {
        return view(theme() . '.class_routines.index', [
            'classes' => $this->routineService->getClassModels(),
        ]);
    }

    public function sectionsGet($id): JsonResponse
    {
        $sections = $this->routineService->findSectionByClassId($id);

        $buttons = [];

        foreach ($sections as $section) {
            $buttons[] = [
                'id' => $section->id,
                'class' => 'btn btn-light border section-button mx-2 py-2 px-5',
                'text' => __($section->section_name),
            ];
        }

        return response()->json(['buttons' => $buttons]);
    }


    public function sectionsRoutine(int $class_id, int $section_id): Renderable
    {
        return view(theme() . '.class_routines.partials.routine-list', [
            'class' => ClassModel::find($class_id),
            'section' => Section::find($section_id),
            'routine' => ClassRoutine::getRoutineView($class_id, $section_id),
        ]);
    }
}
