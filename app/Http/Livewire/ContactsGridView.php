<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;
use Livewire\WithPagination;

class ContactsGridView extends Component
{
    use withPagination;
    public $search ;
    public $page = 1;
    protected $queryString = [ 'search' => ['except' => ''],
    'page' => ['except' => 1],];

    public function render()
    {

        $contacts = Contact::where('name', 'like', '%'.$this->search.'%')
        ->orWhere('orgname', 'like', '%'.$this->search.'%')
        ->orWhere('title', 'like', '%'.$this->search.'%')
        ->orWhere('orgname', 'like', '%'.$this->search.'%')
        ->orWhere('email2', 'like', '%'.$this->search.'%')
        ->orWhere('email1', 'like', '%'.$this->search.'%')
        ->paginate();
        return view('livewire.contacts-grid-view', compact('contacts'));
    }
}
