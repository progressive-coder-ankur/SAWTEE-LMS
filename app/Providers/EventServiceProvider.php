<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Listeners\SendNewUserNotification;
use App\Events\BookRequested;
use App\Listeners\SendNewBookRequestNotification;
use App\Listeners\UserLastLoggedIn;
use App\Events\BookIssue;
use App\Listeners\SendNewIssueNotification;
use App\Events\LeaveRequested;
use App\Listeners\SendNewLeaveRequestNotification;
use App\Events\LeaveApproved;
use App\Listeners\SendNewLeaveApprovalNotification;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
            SendNewUserNotification::class,
        ],

        BookRequested::class => [
            SendNewBookRequestNotification::class,
        ],

        Login::class => [
            UserLastLoggedIn::class,
        ],

        BookIssue::class => [
            SendNewIssueNotification::class,
        ],

        LeaveRequested::class => [
            SendNewLeaveRequestNotification::class,
        ],

        LeaveApproved::class => [
            SendNewLeaveApprovalNotification::class,
        ],

    ];


    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
