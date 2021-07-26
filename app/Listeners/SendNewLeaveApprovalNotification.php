<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use App\Events\LeaveApproved;
use App\Notifications\NewLeaveApprovalNotification;

class SendNewLeaveApprovalNotification
{

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(LeaveApproved $event)
    {
        $user = User::find($event->leaveRequest->user_id);
        Notification::send($user, new NewLeaveApprovalNotification($event->leaveApproval));
    }
}
