<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use App\Events\LeaveRequested;
use App\Notifications\NewLeaveRequestNotification;


class SendNewLeaveRequestNotification
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
    public function handle(LeaveRequested $event)
    {
        $approver = User::whereHas('roles', function($query){
            $query->where('id', 3);
        })->get();

        Notification::send($approver, new NewLeaveRequestNotification($event->leaveRequest));


    }
}
