<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use App\Events\BookIssue;
use App\Models\User;
use App\Notifications\NewIssueNotification;

class SendNewIssueNotification
{


    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(BookIssue $event)
    {
        $user = User::find($event->bookRequest->user_id);


        Notification::send($user, new NewIssueNotification($event->bookIssued));
    }
}
