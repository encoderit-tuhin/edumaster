<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StudentFeedback extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */

    public $feedback;
    public $staff;
    public $student;
    public function __construct($feedback, $staff, $student)
    {
        $this->feedback = $feedback;
        $this->staff = $staff;
        $this->student = $student;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'feedback' => $this->feedback,
            'staff' => $this->staff,
            'student' => $this->student,
        ];
    }
}
