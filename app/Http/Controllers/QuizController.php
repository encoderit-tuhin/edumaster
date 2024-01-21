<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\Section;
use App\Student;
use Illuminate\Http\Request;
use App\Services\QuizService;
use App\Services\SectionService;
use App\Services\StudentService;
use Illuminate\Contracts\View\View;
use App\Repositories\StudentRepository;
use App\Services\StudentSessionService;
use PHPUnit\Framework\MockObject\Builder\Stub;
use App\Services\StudentOnlineRegistrationService;

class QuizController extends Controller
{
    private $studentRepo;

    public function __construct(
        private readonly StudentService $studentService,
        private readonly StudentOnlineRegistrationService $studentOnlineRegistrationService,
        private readonly QuizService $quizService,
        private readonly StudentSessionService $studentSessionService,
        private readonly SectionService $sectionService,


        StudentRepository $studentRepo
    ) {
        $this->studentRepo = $studentRepo;
    }
    public function index()
    {
        return view('backend.quiz.index', [
            'sections' => $this->sectionService->getSections(),

        ]);
    }
    public function create()
    {
    }

    public function store(Request $request)
    {
        if ($request->action_type == 2) {
            $alreadySubmitQuizMarks = $this->quizService->alreadySubmitQuizMarks($request);
            if ($alreadySubmitQuizMarks) {
                return back()->with('error', 'Quiz marks already submitted.');
            } else {
                $this->quizService->createQuiz($request);
                return back()->with('success', 'Quiz Marks added successfully.');
            }
        }
        if ($request->action_type == 3) {
            $this->quizService->bulkUpdate($request);
            return back()->with('success', 'Quiz Marks Updated successfully.');
        }
    }

    public function show(Quiz $quiz)
    {
        //
    }


    public function edit(Quiz $quiz)
    {
        //
    }


    public function update(Request $request, Quiz $quiz)
    {

        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quiz $quiz)
    {
        //
    }
    public function quizResultSearch(Request $request)
    {
        if ($request->ajax()) {
            $subject = $request->subject_id;
            $class_id = $request->classId;
            $section_id = $request->section;
            $group = $request->group;
            $session_id = $request->session_id;
            $action_type = $request->action_type;


            if ($action_type == 1) {
                $quizzes = $this->quizService->getQuizResult($request);
                return view('backend.quiz.show', compact('quizzes'));
            }
            // search student for quiz marks
            if ($action_type == 2) {

                $alreadySubmitQuizMarks = $this->quizService->alreadySubmitQuizMarks($request);
                if ($alreadySubmitQuizMarks) {
                    $quizzes = $this->quizService->getQuizResult($request);
                    $error = 1;
                    return view('backend.quiz.show', compact('quizzes', 'error'));
                } else {
                    $students = $this->studentSessionService->getAllStudentSessions();

                    if ($session_id && $class_id && $section_id) {
                        $students = $students->where('session_id', $session_id)
                            ->where('class_id', $class_id)
                            ->where('section_id', $section_id);
                        return view('backend.quiz.create', compact('students'));
                    }
                }
            }
            if ($action_type == 3) {
                // $students = Quiz::where('class', $class_id)->where('section', $section_id)->get();
                $quizzes = $this->quizService->getQuizResult($request);
                return view('backend.quiz.edit', compact('quizzes'));
            }
        }
    }
}
