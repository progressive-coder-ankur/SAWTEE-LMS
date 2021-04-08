<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ActionNotifications extends Component
{

    public function markAsRead(string $notificationId)
    {
        $notifications = auth()->user()->unreadNotifications()->where('id', $notificationId)->first()->markAsRead();
        $this->emit('NotificationMarkedAsRead');
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.action-notifications');
    }
}
