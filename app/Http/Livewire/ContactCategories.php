<?php

namespace App\Http\Livewire;

use App\Models\ContactCategory;
use App\Models\ContactList;
use Livewire\Component;

class ContactCategories extends Component
{

    public $name, $category_id;


    public function resetInputFields()
    {
        $this->name = '';
        $this->category_id = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|unique:contact_categories,name,'.$this->category_id,
        ]);
        $data = array(
            'name' => $this->name
        );
        $category = ContactCategory::updateOrCreate(['id' => $this->category_id],$data);
        session()->flash('message', $this->category_id ? 'Category updated successfully.' : 'Category created successfully.');
        $this->resetInputFields();
        return redirect()->to('/contact/categories');
    }

    public function edit($id)
    {
        $category = ContactCategory::findOrFail($id);
        $this->category_id = $id ;
        $this->name = $category->name;
    }

    // public function delete($id)
    // {
    //     $this->category_id = $id ;
    //     $category = ContactCategory::find($id)->delete();
    //     session()->flash('message', 'Category deleted Successfully');

    // }

    public function render()
    {
        return view('livewire.contact-categories');
    }



}
