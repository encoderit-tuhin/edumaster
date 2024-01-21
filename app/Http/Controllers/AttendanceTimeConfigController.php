<?php

namespace App\Http\Controllers;

use App\AttendanceTimeConfig;
use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Support\Renderable;
use App\Services\AttendanceTimeConfigService;
use App\Http\Requests\AttendanceTimeConfigCreateRequest;

class AttendanceTimeConfigController extends Controller
{
    public function __construct(
        private readonly AttendanceTimeConfigService $attendanceTimeConfig
    ) {
    }

    public function index(): Renderable
    {
        return view('backend.time_config.index', [
            'attendanceTimeConfig' => $this->attendanceTimeConfig->getAttendanceTimeConfigs()
        ]);
    }

    public function store(AttendanceTimeConfigCreateRequest $request): RedirectResponse|Redirector
    {
        $attendanceTimeConfig = $this->attendanceTimeConfig->createAttendanceTimeConfig($request->validated());

        if (!$attendanceTimeConfig) {
            return redirect('attendance-time-config')->with('error', _lang('Something went wrong. Attendance Time Config can not be submitted.'));
        }

        return redirect('attendance-time-config')->with('success', _lang('Attendance Time Config application has been submitted.'));
    }

    public function show($id)
    {
        $attendanceTimeConfig = AttendanceTimeConfig::find($id);
        if (!$attendanceTimeConfig) {
            return redirect('attendance-time-config')->with('error', _lang('Something went wrong. Attendance Time Config can not be show.'));
        }
        return view('backend.time_config.index', compact('attendanceTimeConfig'));
    }

    public function edit($id): Renderable
    {
        $attendanceTimeConfig = $this->attendanceTimeConfig->findAttendanceTimeConfigById($id);
        if (!$attendanceTimeConfig) {
            return redirect('attendance-time-config')->with('error', _lang('Something went wrong. Attendance Time Config can not be edit.'));
        }

        return view('backend.time_config.edit', [
            'attendanceTimeConfig' => $attendanceTimeConfig
        ]);
    }

    public function update(AttendanceTimeConfigCreateRequest $request, $id): RedirectResponse|Redirector
    {
        $attendanceTimeConfig = $this->attendanceTimeConfig->findAttendanceTimeConfigById($id);

        if (!$attendanceTimeConfig) {
            return redirect('attendance-time-config')->with('error', _lang('Something went wrong. Attendance Time Config can not be update.'));
        }

        $this->attendanceTimeConfig->updateAttendanceTimeConfig($request->validated(), $id);

        return redirect('attendance-time-config')->with('success', _lang('Information has been added'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse|Redirector
    {
        $attendanceTimeConfig = $this->attendanceTimeConfig->deleteAttendanceTimeConfigById($id);

        if (!$attendanceTimeConfig) {
            return redirect('attendance-time-config')->with('error', _lang('Something went wrong. Attendance Time Config can not be delete.'));
        }

        return redirect('attendance-time-config')->with('success', _lang('Information has been deleted'));
    }
}
