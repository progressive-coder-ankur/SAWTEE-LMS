<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Activity;

class TrackEvents extends Component
{

    public function render()
    {
       $activities = Activity::all();
        return view('livewire.track-events', [
            'activities' => $activities,
        ]);
    }
}
