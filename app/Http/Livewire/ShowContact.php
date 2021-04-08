<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;

class ShowContact extends Component
{

    protected $listeners = ['showContact' => 'show'];

    public function show($id)
    {
        $contact = Contact::find($id);
        return view('contact.show', compact('contact'));
    }

    public function render()
    {
        return view('livewire.show-contact');
    }
}
