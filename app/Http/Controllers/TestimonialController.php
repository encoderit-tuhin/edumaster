<?php

namespace App\Http\Controllers;

use COM;
use PDF;
use App\Student;
use App\Testimonial;
use App\StudentSession;
use Illuminate\Http\Request;
use PHPUnit\Event\Code\Test;
use App\StudentOnlineRegistration;
use App\Services\TestimonialService;
use App\Http\Requests\TestimonialRequest;

class TestimonialController extends Controller
{
    public function __construct(private readonly TestimonialService $testimonialService)
    {
    }

    public function index()
    {
        return view('backend.testimonial.index', [
            'testimonials' => $this->testimonialService->getTestimonials(),
        ]);
    }


    public function create()
    {
        return view('backend.testimonial.create');
    }


    public function store(Request $request)
    {
        $testimonial = StudentOnlineRegistration::where('roll', $request->roll)
            ->with('studentGroup')->first();
        if (!$testimonial) {
            return back()->with('error', "No student Found");
        }
        // dd($request->roll);
        return view('backend.testimonial.testimonial-format', compact('testimonial'));

        // $this->testimonialService->createTestimonial($request->validated());
        // return redirect()->route('testimonial.index')
        //     ->with('success', 'Testimonial created successfully.');
    }

    public function show($id)
    {
        $testimonial = $this->testimonialService->findTestimonialById($id);
        if (!$testimonial) {
            abort(404);
        }
        return view('backend.testimonial.show', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $testimonial = $this->testimonialService->findTestimonialById($id);
        if (!$testimonial) {
            abort(404);
        }
        $boardsName = get_board_name();

        return view('backend.testimonial.edit', compact('testimonial', 'boardsName'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TestimonialRequest $request, $id)
    {
        // dd($request);
        $testimonial = $this->testimonialService->findTestimonialById($id);
        if (!$testimonial) {
            abort(404);
        }
        $testimonial->update($request->validated());
        return redirect()->route('testimonial.index')
            ->with('success', 'Testimonial Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $testimonial = $this->testimonialService->findTestimonialById($id);
        if (!$testimonial) {
            abort(404);
        }
        $this->testimonialService->deleteTestimonialById($id);

        return redirect()->route('testimonial.index')
            ->with('success', 'Testimonial deleted successfully');
    }


    public function studentSearch(Request $request)
    {
        // return $request;
        if ($request->ajax()) {
            $boardsName = get_board_name();

            $student = Student::join('users', 'users.id', '=', 'students.user_id')
                ->join('student_sessions', 'students.id', '=', 'student_sessions.student_id')
                ->join('classes', 'classes.id', '=', 'student_sessions.class_id')
                ->join('sections', 'sections.id', '=', 'student_sessions.section_id')
                ->where('student_sessions.session_id', get_option('academic_year'))
                ->where('students.id', (int) $request->studentId)->first();

            return view('backend.testimonial.search-student', compact('student', 'boardsName'));
        }
    }
    public function testimonialPdf($id)
    {
        $testimonial = $this->testimonialService->findTestimonialById($id);
        if (!$testimonial) {
            abort(404);
        }
        $data = [
            'testimonial' => $testimonial,
        ];
        // return $data;
        $pdf = PDF::loadView('backend.testimonial.testimonial-format', $data);
        return $pdf->download($testimonial->student->first_name . '-' . $testimonial->student->id . '.pdf');
    }
}
