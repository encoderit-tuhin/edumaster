<?php

declare(strict_types=1);

namespace App\Services;

use App\Student;
use Illuminate\Support\Facades\Log;
use App\Repositories\StudentRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class StudentService
{
    public function __construct(
        private readonly StudentRepository $studentRepository
    ) {
    }

    public function getStudents(array $filter = []): LengthAwarePaginator
    {
        return $this->studentRepository->paginate(20, $filter);
    }

    public function findStudentById(int $id): ?Student
    {
        return $this->studentRepository->show($id);
    }

    public function createStudent(array $data, $userId = null): ?Student
    {
        $data['user_id'] = intval($userId);

        return $this->studentRepository->create($data);
    }

    public function updateStudent(array $data, int $id)
    {
        return $this->studentRepository->update($data, $id);
    }

    public function deleteStudentById(int $id)
    {
        return $this->studentRepository->delete($id);
    }

    public function getStudentsByClassSectionGroup($classId = null, $sectionId = null, $groupId = null)
    {
        // Log::debug(
        //     [
        //         'classId' => $classId,
        //         'sectionId' => $sectionId,
        //         'groupId' => $groupId
        //     ]
        // );

        $query = Student::query()
            ->select('users.*', 'student_sessions.roll', 'classes.class_name', 'sections.section_name', 'students.id as id', 'student_groups.group_name', 'students.user_id', 'students.first_name', 'students.last_name', 'students.status as student_status')
            ->join('users', 'users.id', '=', 'students.user_id')
            ->join('student_sessions', 'students.id', '=', 'student_sessions.student_id')
            ->leftJoin('classes', 'classes.id', '=', 'student_sessions.class_id')
            ->leftJoin('sections', 'sections.id', '=', 'student_sessions.section_id')
            ->leftJoin('student_groups', 'students.group', '=', 'student_groups.id')
            ->where('student_sessions.session_id', get_option('academic_year'))
            ->where('users.user_type', 'Student')
            // ->where('students.status', '1')
            ->where('student_sessions.class_id', $classId)
            ->orderBy('student_sessions.roll', 'ASC');

        if ($sectionId > 0) {
            $query->where('student_sessions.section_id', $sectionId);
        }

        if ($groupId > 0) {
            $query->where('students.group', $groupId);
        }

        return $query->get();
    }

    public function getStudentById($id): Student|null
    {
        return Student::join('users', 'users.id', '=', 'students.user_id')
            ->where('students.id', $id)
            ->select('users.*', 'students.id as studentId')
            ->first();
    }
}
