<?php

namespace App\Http\Controllers;

use App\Services\UserLogService;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;

class UserLogsController extends Controller
{
    public function __construct(private readonly UserLogService $userLogService)
    {
    }

    public function index(): View|Factory
    {
        return view('backend.user_logs.index', [
            'userLogs' => $this->userLogService->getUserLogs(),
        ]);
    }

    public function destroy($id): Redirector|RedirectResponse
    {
        $department = $this->userLogService->deleteUserLogById($id);

        if (!$department) {
            return redirect('user-logs')->with('error', _lang('Something went wrong. User Log can not be delete.'));
        }

        return redirect('user-logs')->with('success', _lang('Information has been deleted'));
    }
}
