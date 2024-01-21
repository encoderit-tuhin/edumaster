<?php

namespace App\Http\Controllers;

use App\User;
use App\Leave;
use Illuminate\Http\Request;
use App\Services\LeaveService;
use App\Services\StudentService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LeaveCreateRequest;
use App\Http\Requests\LeaveStatusRequest;
use Illuminate\Contracts\Support\Renderable;

class LeaveController extends Controller
{
    public function __construct(
        private readonly LeaveService $leaveService,
        private readonly StudentService $studentService,
    ) {
    }

    public function index(): Renderable
    {
        return view('backend.leave.index', [
            'leaves' => $this->leaveService->getLeaves(),
        ]);
    }

    public function create(): Renderable
    {
        return view('backend.leave.create', [
            'leaveTypes' => $this->leaveService->getLeavesTypes(),
            'students' => $this->studentService->getStudents(),
        ]);
    }

    public function store(LeaveCreateRequest $request): \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    {
        $hasPreviousLeave = $this->leaveService->userHasPreviousLeaveInDateRange(
            $request->from_date,
            $request->to_date,
            auth::id(),
        );

        if ($hasPreviousLeave) {
            return redirect('leave')->with('error', _lang('Already leave submitted in this date range.'));
        }

        $leave = $this->leaveService->createLeave($request->validated());
        if (!$leave) {
            return redirect('leave')->with('error', _lang('Something went wrong. Leave can not be submitted.'));
        }

        return redirect('leave')->with('success', _lang('Leave application has been submitted.'));
    }

    public function show($id)
    {
        $leaveTypes = $this->leaveService->getLeavesTypes();
        $leave = Leave::find($id);
        if (!$leave) {
            abort(404);
        }
        return view('backend.leave.show', compact('leave', 'leaveTypes'));
    }

    public function edit($id): Renderable
    {
        $leave = $this->leaveService->findLeaveById($id);
        if (!$leave) {
            abort(404);
        }

        return view('backend.leave.edit', [
            'leave' => $leave,
            'leaveTypes' => $this->leaveService->getLeavesTypes(),
            'leavesStatuses' => $this->leaveService->getLeavesStatuses(),
            'students' => $this->studentService->getStudents(),
        ]);
    }


    public function update(LeaveCreateRequest $request, $id): \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    {
        $leave = $this->leaveService->findLeaveById($id);
        if (!$leave) {
            abort(404);
        }
        $this->leaveService->updateLeave($request->validated(), $id);

        return redirect('leave')->with('success', _lang('Information has been added'));;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        $leave = $this->leaveService->findLeaveById($id);
        if (!$leave) {
            abort(404);
        }
        $this->leaveService->deleteLeaveById($id);
        return redirect('leave')->with('success', _lang('Information has been deleted'));
    }
    public function updateStatus(LeaveStatusRequest $request, $id)
    {
        $leave = $this->leaveService->findLeaveById($id);
        if (!$leave) {
            abort(404);
        }

        $this->leaveService->updateLeaveStatus($request, $id);
        return redirect()->back()->with('success', _lang('Information has been updated'));
    }
}
