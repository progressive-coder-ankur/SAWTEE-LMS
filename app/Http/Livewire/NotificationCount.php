<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NotificationCount extends Component
{
    public $count;

    protected $listeners = ['NotificationMarkedAsRead' => 'render'];

    public function updateCount(int $count): int
    {
        return $count;
    }


    public function render()
    {
        $this->count = auth()->user()->unreadNotifications()->count();
        return view('livewire.notification-count', [
            'notificationsCount' => $this->count,
        ]);
    }
}
