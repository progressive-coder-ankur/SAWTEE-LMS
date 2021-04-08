<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class Events extends Component
{
    public $title, $event_id;
    public $show = false;
    public $updateMode = false;
    protected $listeners = ['edit' => 'edit'];
    public function show()
    {
        $this->resetInput();
        $this->openModal();
    }

    public function openModal()
    {
        $this->show = true;
        // Clean errors if were visible before
        $this->resetErrorBag();
        $this->resetValidation();
    }


    public function closeModal(){
        $this->show = false;
    }

    public function resetInput()
    {
        $this->title = NULL;
        $this->show = false;
        $this->updateMode = false;
    }

    public function showModal()
    {
        $this->emit('swal:modal', [
            'type'  => 'success',
            'title' => 'Event',
            'icon' => 'success',
            'text'  => "Event Updated Successfully",
        ]);
    }

    public function showAlert()
    {
        $this->emit('swal:alert', [
            'type'    => 'success',
            'title'   => 'Event',
            'text' => 'Event Created Successfully',
            'icon' => 'success',
            'timeout' => 3000
        ]);
    }

    public function store()
    {
        $this->validate(['title' => 'required|string|max:255']);

        $data = array(
            'title' => $this->title,
        );

        Event::create($data);
        $this->resetInput();
        $this->showAlert();
        $this->emit('renderUpdatedData');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $this->event_id = $id;
        $this->title = $event->title;
        $this->updateMode = true;
        $this->show = true;
    }

    public function update()
    {

        $this->validate(['title' => 'required|string|max:255']);
        if ($this->event_id) {
            $event = Event::find($this->event_id);
            $event = update([
                'title' => $this->title,
            ]);
        }
        $this->resetInput();
        $this->showModal();
    }

    public function showEvent($id)
    {

        $event = Event::find($id);
        return view('event.event-list', compact('event'));
    }



    public function render()
    {
        return view('livewire.events');
    }
}
