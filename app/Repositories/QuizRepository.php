<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Quiz;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class QuizRepository implements BaseRepositoryInterface
{
    public function all(): Collection
    {
        return Quiz::all();
    }

    public function paginate(int $perPage = 10, array $filter = []): LengthAwarePaginator
    {
        $query = Quiz::query();
        return $query->paginate($perPage);
    }

    public function create($data): ?Quiz
    {
        // dd($data);

        $studentIds = $data->input('student_id');
        $quiz1 = $data->input('quiz1');
        $quiz2 = $data->input('quiz2');
        $quiz3 = $data->input('quiz3');
        $quiz4 = $data->input('quiz4');
        $class = $data->input('class');
        $section = $data->input('section');
        $group = $data->input('group');
        $subject_id = $data->input('subject_id');


        foreach ($studentIds as $key => $studentId) {
            $quiz = new Quiz();
            $quiz->student_id = $studentId;
            $quiz->quiz1 = $quiz1[$key][0] ?? 0;
            $quiz->quiz2 = $quiz2[$key][0] ?? 0;
            $quiz->quiz3 = $quiz3[$key][0] ?? 0;
            $quiz->quiz4 = $quiz4[$key][0] ?? 0;
            $quiz->class = $class;
            $quiz->section = $section;
            $quiz->group = $group;
            $quiz->subject_id = $subject_id;

            $quiz->save();
        }
        return $quiz;
    }

    public function update(array $data, int $id): ?Quiz
    {
        $Quiz = $this->show($id);
        if ($Quiz) {
            $Quiz->update($data);
        }
        return $Quiz;
    }
    public function bulkUpdate($data)
    {

        $quiz_ids = $data->input('quiz_id');
        $quiz1 = $data->input('quiz1');
        $quiz2 = $data->input('quiz2');
        $quiz3 = $data->input('quiz3');
        $quiz4 = $data->input('quiz4');

        // dd($quiz_ids[2][0]);
        foreach ($quiz_ids as $key => $quiz_id) {
            //   dd($quiz_id);
            $quiz = Quiz::find($quiz_ids[$key][0]);

            $quiz->quiz1 = $quiz1[$key][0] ?? 0;
            $quiz->quiz2 = $quiz2[$key][0] ?? 0;
            $quiz->quiz3 = $quiz3[$key][0] ?? 0;
            $quiz->quiz4 = $quiz4[$key][0] ?? 0;
            // $quiz->class = $class;
            // $quiz->section = $section;
            // $quiz->group = $group;
            // $quiz->subject_id = $subject_id;

            $quiz->save();
        }
        return $quiz;
    }

    public function show(int $id): ?Quiz
    {
        return Quiz::find($id);
    }
    public function delete(int $id)
    {
        return Quiz::destroy($id);
    }
    public function alreadySubmitQuizMarks($data)
    {
        $class = (empty($data['class']) ? $data['classId'] : (empty($data['classId']) ? $data['class'] : null));
        $checkAlreadySubmitQuiz = Quiz::where('class', $class)
            ->where('section', $data['section'])
            ->where('group', $data['group'])
            ->where('subject_id', $data['subject_id'])
            ->first();
        return $checkAlreadySubmitQuiz;
    }
    public function getQuizResult($request)
    {
        $subject = $request->subject_id;
        $class_id = $request->classId;
        $section_id = $request->section;
        $group = $request->group;
        $session_id = $request->session_id;
        $action_type = $request->action_type;

        return   Quiz::where('class', $class_id)
            ->where('section', $section_id)
            ->where('group', $group)
            ->where('section', $section_id)
            ->where('subject_id', $subject)
            ->get();
    }


    public function updateQuizStatus($request, int $id): bool
    {
        $Quiz = $this->show($id);
        if ($Quiz) {
            $Quiz->status = $request->status;
            $Quiz->approve_by = auth()->id();

            return  $Quiz->save();
        }
        return false;
    }
}
