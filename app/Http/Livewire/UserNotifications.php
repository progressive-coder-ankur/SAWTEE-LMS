<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Notifications\DatabaseNotification;


class UserNotifications extends Component
{



    public function markAsRead(string $notificationId)
    {
        $notifications = auth()->user()->unreadNotifications()->where('id', $notificationId)->first()->markAsRead();
        $this->emit('NotificationMarkedAsRead', $notifications);
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.user-notifications');
    }
}
