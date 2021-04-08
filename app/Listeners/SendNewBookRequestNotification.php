<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use App\Events\BookRequested;
use App\Notifications\NewRequestNotification;

class SendNewBookRequestNotification
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
    public function handle(BookRequested $event)
    {
        $admins = User::whereHas('roles', function ($query) {
            $query->where('id', 1);
        })->get();
        Notification::send($admins, new NewRequestNotification($event->bookRequest));
    }
}
