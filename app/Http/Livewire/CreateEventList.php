<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;

class CreateEventList extends Component
{
    public function render()
    {
        $events = Event::all();
        return view('livewire.create-event-list', compact('events'));
    }
}
