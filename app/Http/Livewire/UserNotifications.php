<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Notifications\DatabaseNotification;

class UserNotifications extends Component
{



    public function markAsRead(string $notificationId)
    {
        $notifications = auth()->user()->unreadNotifications()->where('id', $notificationId)->first()->markAsRead();
        return redirect()->back();
        $this->emit('NotificationMarkedAsRead', $notifications);
    }

    public function render()
    {
        return view('livewire.user-notifications');
    }
}
