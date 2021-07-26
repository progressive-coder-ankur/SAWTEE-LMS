<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\LeaveRequest;

class NewLeaveApprovalNotification extends Notification
{
    use Queueable;
    public $leaveApproval;


    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($leaveApproval)
    {
        $this->leaveApproval = $leaveApproval;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        
        return (new MailMessage)
                    ->subject('Leave Approved')
                    ->line('Your Leave Request has been approved.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $data = LeaveRequest::find($this->leaveApproval->request_id);

        return [
            'id' => $this->leaveApproval->request_id,
            'type' =>$data->leave_type,
            'created' =>$this->leaveApproval->created_at,
            'message' => 'Leave Request Approved'
        ];
    }
}
