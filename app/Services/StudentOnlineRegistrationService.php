<?php

declare(strict_types=1);

namespace App\Services;

use Exception;
use App\StudentOnlineRegistration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\StudentOnlineRegistrationRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class StudentOnlineRegistrationService
{
    public function __construct(
        private readonly UserService $userService,
        private readonly ClassService $classService,
        private readonly SectionService $sectionService,
        private readonly StudentService $studentService,
        private readonly StudentSessionService $studentSessionService,
        private readonly StudentOnlineRegistrationRepository $studentOnlineRegistrationRepository
    ) {
    }

    public function getStudentOnlineRegistrations(array $filter = []): LengthAwarePaginator
    {
        return $this->studentOnlineRegistrationRepository->paginate(3000, $filter);
    }

    public function findStudentOnlineRegistrationById(int $id): ?StudentOnlineRegistration
    {
        return $this->studentOnlineRegistrationRepository->show($id);
    }

    public function findStudentOnlineRegistrationByStudentId(int $id): ?StudentOnlineRegistration
    {
        return $this->studentOnlineRegistrationRepository->findStudentOnlineRegistrationByStudentId($id);
    }

    public function createStudentOnlineRegistration(array $data)
    {
        $imagePath = 'students/profile.png';

        if (isset($data['image']) && $data['image']->isValid()) {
            $image = $data['image'];
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('uploads/images/students/') . $imageName;
            Image::make($image)->resize(300, 300)->save($imagePath);
            $imagePath = 'students/' . $imageName; // Updated image path
        }

        $data['image'] = $imagePath;

        $onlineApplication = $this->studentOnlineRegistrationRepository->create($data);

        // Only for NDCM. If you want to use this for other school, then remove this code.
        return $this->syncWithStudentCreate($onlineApplication, $data);
    }

    public function syncWithStudentCreate($studentOnlineRegistration, array $data)
    {
        // If no roll, means it's not from the admin side, no need to create student.
        if (empty($data['roll'])) {
            return $studentOnlineRegistration;
        }

        try {
            DB::beginTransaction();
            $password = rand(100000, 999999);
            $user = $this->userService->createOrUpdateUser([
                'name' => $studentOnlineRegistration->first_name,
                'email' => $studentOnlineRegistration->information_sent_to_phone,
                'phone' => $studentOnlineRegistration->information_sent_to_phone,
                'password' => $password,
                'password_static' => $password,
                'role_id' => 5,
                'status' => 1,
                'image' => $data['image'] ?? $studentOnlineRegistration->image ?? null, //$studentOnlineRegistration->image,
                'user_type' => 'Student',
            ]);

            $student = $this->studentService->createStudent([
                'user_id' => $user->id,
                'first_name' => $studentOnlineRegistration->first_name,
                'last_name' => $studentOnlineRegistration->last_name ?? null,
                'father_name' => $studentOnlineRegistration->father_name ?? null,
                'mother_name' => $studentOnlineRegistration->mother_name ?? null,
                'birthday' => $studentOnlineRegistration->birthday ?? null,
                'gender' => 'Male', // NDCM only has Male student.
                'blood_group' => $studentOnlineRegistration->blood_group ?? null,
                'religion' => $studentOnlineRegistration->religion ?? null,
                'phone' => $studentOnlineRegistration->phone ?? null,
                'address' => $studentOnlineRegistration->present_address ?? null,
                'state' => 'Bangladesh',
                'country' => 'Bangladesh',
                'group' => $studentOnlineRegistration->group_id ?? null,
            ], $user->id);

            // $this->storeStudentAllInformation(
            //     $request->validated(),
            //     $request->online_form_id,
            //     $student->id
            // );

            $this->updateStudentOnlineRegistratioStudentId(
                $user,
                $student,
                $studentOnlineRegistration->id
            );

            $data = [
                'session_id' => $data['session_id'] ?? intval(get_option('academic_year')),
                'student_id' => intval($student->id),
                'class_id' => intval($data['class_id']),
                'section_id' => intval($data['section_id']),
                'roll' => intval($data['roll']),
                'optional_subject' => null,
            ];

            $this->studentSessionService->createStudentSession($data);

            DB::commit();
            return $studentOnlineRegistration;
        } catch (Exception $e) {
            Log::error('Syncing Student with online application::' . $e->getMessage());
            DB::rollback();
            Log::error('Syncing Student with online application::' . $e->getMessage());
            throw $e;
        }
    }

    // Only for NDCM.
    public function syncWithStudentUpdate($studentOnlineRegistration, array $data)
    {
        try {
            // Do the update process now.
            DB::beginTransaction();

            // If no roll, then create student, user and student session.
            if (empty(request()->roll)) {
                throw new Exception('Please provide roll number');
            }
            if (empty(request()->information_sent_to_phone)) {
                throw new Exception('Please provide information sent to phone');
            }

            // If student_id is empty, then create student, user and student session first.
            if (empty($studentOnlineRegistration->student_id)) {
                $this->syncWithStudentCreate($studentOnlineRegistration, $data);
            }

            // Get updated student information.
            $studentOnlineRegistration = $this->studentOnlineRegistrationRepository->show($studentOnlineRegistration->id);

            // Get student information.
            $student = $this->studentService->findStudentById($studentOnlineRegistration->student_id);

            if (empty($student)) {
                throw new Exception('Student not found');
            }

            // Create user if needed.
            $user = $this->userService->createOrUpdateUser([
                'name' => $studentOnlineRegistration->first_name,
                'email' => $studentOnlineRegistration->information_sent_to_phone,
                'phone' => $studentOnlineRegistration->information_sent_to_phone,
                'role_id' => 5,
                'status' => 1,
                'image' => $data['image'] ?? $studentOnlineRegistration->image ?? null,
                'user_type' => 'Student',
            ], $studentOnlineRegistration->user_id);

            // Update Student information.
            $this->studentService->updateStudent([
                'user_id' => $user->id,
                'first_name' => $studentOnlineRegistration->first_name,
                'last_name' => $studentOnlineRegistration->last_name ?? null,
                'father_name' => $studentOnlineRegistration->father_name ?? null,
                'mother_name' => $studentOnlineRegistration->mother_name ?? null,
                'birthday' => $studentOnlineRegistration->birthday ?? null,
                'gender' => 'Male', // NDCM only has Male student.
                'blood_group' => $studentOnlineRegistration->blood_group ?? null,
                'religion' => $studentOnlineRegistration->religion ?? null,
                'phone' => $studentOnlineRegistration->phone ?? null,
                'address' => $studentOnlineRegistration->present_address ?? null,
                'state' => 'Bangladesh',
                'country' => 'Bangladesh',
                'group' => $studentOnlineRegistration->group_id ?? null,
            ], $studentOnlineRegistration->student_id);

            $data = [
                'session_id' => $data['session_id'] ?? intval(get_option('academic_year')),
                'student_id' => intval($studentOnlineRegistration->student_id),
                'class_id' => intval($studentOnlineRegistration->class_id),
                'section_id' => intval($studentOnlineRegistration->section_id),
                'roll' => intval($studentOnlineRegistration->roll),
                'optional_subject' => null,
            ];

            // Find student session id by student id.
            $studentSession = $this->studentSessionService->findStudentSessionByStudentId(
                $studentOnlineRegistration->student_id
            );

            if ($studentSession) {
                $this->studentSessionService->updateStudentSession(
                    $data,
                    $studentSession->id
                );
            }

            DB::commit();
            return $studentOnlineRegistration;
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    // This methods are only for NDCM.
    public function updateStudentOnlineRegistration(array $data, int $id)
    {
        $studentOnlineRegistration = $this->studentOnlineRegistrationRepository->show($id);

        if (!$studentOnlineRegistration) {
            throw new Exception('Online Application Not Found');
        }

        // If image is updated, then upload new image and delete old image
        if (!empty($data['image'])) {
            if (isset($data['image']) && $data['image']->isValid()) {
                $image = $data['image'];
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $imagePath = public_path('uploads/images/students/') . $imageName;
                Image::make($image)->resize(300, 300)->save($imagePath);
                $imagePath = 'students/' . $imageName; // Updated image path

                $student = $this->studentOnlineRegistrationRepository->show($id);
                if ($student->image !== 'students/profile.png') {
                    if (file_exists(public_path('uploads/images/students/') . $student->image)) {
                        unlink(public_path('uploads/images/students/') . $student->image);
                    }
                }

                $data['image'] = $imagePath;
            }
        }

        // First update the data.
        $this->studentOnlineRegistrationRepository->update($data, $id);

        // Fetch the updated data.
        $studentOnlineRegistration = $this->studentOnlineRegistrationRepository->show($id);

        // Create and manage Student and User information.
        $this->syncWithStudentUpdate($studentOnlineRegistration, $data);

        return $studentOnlineRegistration;
    }


    public function updateStudentOnlineRegistratioStudentId($user, $student, $onlineRegistrationId)
    {
        $this->studentOnlineRegistrationRepository->updateStudentOnlineRegistratioStudentId(
            $user,
            $student,
            $onlineRegistrationId
        );
    }

    public function deleteStudentOnlineRegistrationById(int $id)
    {
        return $this->studentOnlineRegistrationRepository->delete($id);
    }

    public function getStudentsByClass(int $class_id): ?Collection
    {
        return StudentOnlineRegistration::where('class_id', $class_id)->get();
    }

    public function getStudentDataByPhone($phone)
    {
        $student = StudentOnlineRegistration::where('phone', $phone)->first();
        return $student;
    }
    public function storeStudentAllInformation($data, $id, $student_id)
    {
        $student = $this->studentOnlineRegistrationRepository->show((int) $id);

        $this->studentOnlineRegistrationRepository->update(['student_id' => $student_id], (int) $id);

        return $this->studentOnlineRegistrationRepository->storeStudentAllInformation($student, $student_id);
    }
}
