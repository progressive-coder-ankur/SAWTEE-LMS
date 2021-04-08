<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Event;

class CreateEventList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $events = Event::all();
        return view('components.create-event-list', compact('events'));
    }
}