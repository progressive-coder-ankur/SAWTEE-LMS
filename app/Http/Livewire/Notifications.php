<?php

namespace App\Http\Livewire;

use Auth;
use Livewire\Component;


class Notifications extends Component
{


    public function markAsRead(string $notificationId)
    {
        $notifications = auth()->user()->unreadNotifications()->where('id', $notificationId)->first()->markAsRead();
        $this->emit('NotificationMarkedAsRead');
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.notifications');
    }
}
