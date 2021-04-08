<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;
use Livewire\WithPagination;

class ContactsGridView extends Component
{
    use withPagination;
    public $search ;
    protected $queryString = ['search'];

    public function render()
    {

        $contacts = Contact::where('name', 'like', '%'.$this->search.'%')
        ->where('orgname', 'like', '%'.$this->search.'%')
        ->paginate();
        return view('livewire.contacts-grid-view', compact('contacts'));
    }
}
