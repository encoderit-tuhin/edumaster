<?php

declare(strict_types=1);

namespace App\Services;

use App\Quiz;
use App\Repositories\QuizRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class QuizService
{
    public function __construct(
        private readonly QuizRepository $quizRepository,
    ) {
    }
    public function getQuiz(array $filter = []): LengthAwarePaginator
    {
        return $this->quizRepository->paginate(20, $filter);
    }

    public function findQuizById(int $id): ?Quiz
    {
        return $this->quizRepository->show($id);
    }

    public function createQuiz($data)
    {
        return $this->quizRepository->create($data);
    }
    public function updateQuiz(array $data, int $id): ?Quiz
    {
        return $this->quizRepository->update($data, $id);
    }
    public function bulkUpdate($data)
    {
        return $this->quizRepository->bulkUpdate($data);
    }
    public function alreadySubmitQuizMarks($data)
    {
        return $this->quizRepository->alreadySubmitQuizMarks($data);
    }
    public function deleteQuizById(int $id)
    {
        return $this->quizRepository->delete($id);
    }
    public function getQuizResult($request)
    {
        return $this->quizRepository->getQuizResult($request);
    }
    public function updateQuizStatus($request, int $id): bool
    {
        return true;
        // $Quiz->status = $request->status;
        // $Quiz->save();
        // return $this->quizRepository->updateQuiztatus($request, $id);
    }
}
