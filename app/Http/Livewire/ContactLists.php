<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ContactCategory;
use App\Models\ContactList;

class ContactLists extends Component
{
    public $name, $list_id, $category, $category_id;
    public function resetInputFields()
    {
        $this->name = '';
        $this->list_id = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|unique:contact_lists,name,'.$this->list_id,
        ]);
        $data = array(
            'name' => $this->name,
            'category' => $this->category
        );

        $list = ContactList::updateOrCreate(['id' => $this->list_id],$data);
        session()->flash('message', $this->list_id ? 'Contact List updated successfully.' : 'Contact List created successfully.');
        $this->resetInputFields();
        return redirect()->to('/contact/lists');
    }

    public function edit($id)
    {
        $list = ContactList::findOrFail($id);
        $this->list_id = $id ;
        $this->categeory = $list->category;
        $this->name = $list->name;
    }

    public function render()
    {
        return view('livewire.contact-lists',[
            'categories' => ContactCategory::get()
        ]);
    }
}
