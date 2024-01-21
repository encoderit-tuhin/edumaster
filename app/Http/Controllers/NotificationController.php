<?php

namespace App\Http\Controllers;

use App\Notifications\StudentFeedback;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function getAdminNotification(Request $request)
    {
        $user = User::findOrFail(Auth::id());

        $feedbacks = $user->notifications()->where('read_at', null)->latest()->get();
        return view('backend.feedback.admin-view', compact('feedbacks'));
    }

    public function getStudentNotification(Request $request)
    {
        if (isset($request->user_type)) {
            $users = User::where('user_type', $request->user_type)->where('user_status', '1')->get();
            return view('backend.feedback.student-view', compact('users'));
        }
        return view('backend.feedback.student-view');
    }

    public function feedbackSend(Request $request)
    {
        $this->validateWith([
            'feedback' => 'required|string',
            'staff' => 'required|exists:users,id',
        ]);
        $admin = User::where('user_type', 'admin')->first();
        $user = User::findOrFail(Auth::id());

        $admin->notify(new StudentFeedback($request->feedback, $request->staff, $user->id));

        session()->flash(
            'success',
            __('Feedback Submitted Successfuly')
        );
        return redirect()->back();
    }
}
