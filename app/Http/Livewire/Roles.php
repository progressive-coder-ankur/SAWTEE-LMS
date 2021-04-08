<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Role;

class Roles extends Component
{
    public $title, $role_id;
    public $show = false;
    public $updateMode = false;

    protected $listeners = ['editRole' => 'edit'];

    public $rules = [
        'title' => 'required|max:255|string',
    ];

    public $message = [
        'title.required' => 'The :attribute cannot be empty, Please Choose a Role.',
        'title.string' => 'The :attribute format is not valid, please check and try again.',
    ];
    private function resetInputFields()
    {
        $this->title = '';
        $this->updateMode = false;
        $this->show= false;
    }

    public function show()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
       $this->show = true;
        // Clean errors if were visible before
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function closeModal()
    {
        $this->show = false;
        $this->resetErrorBag();
        $this->resetValidation();
    }


    public function showModal()
    {
        $this->emit('swal:modal', [
            'type'  => 'success',
            'title' => 'Library',
            'icon' => 'success',
            'text'  => "Role Updated Successfully",
        ]);
    }

    public function showAlert()
    {
        $this->emit('swal:alert', [
            'type'    => 'success',
            'title'   => 'User management:',
            'text' => 'New Role added to library',
            'icon' => 'success',
            'timeout' => 3000
        ]);
    }

    public function addRole()
    {
        $this->validate();

        $data = array(
            'title' => $this->title,

        );

        Role::create($data);
        $this->resetInputFields();
        $this->showAlert();
        $this->emit('renderUpdatedData');
    }


    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $this->role_id = $id;
        $this->title = $role->title;
        $this->show = true;
        $this->updateMode = true;
    }


    public function updateRole()
    {
        $this->validate();


            $role = Role::find($this->role_id);

            $book->update([
                'title' => $this->title,
            ]);

            $this->resetInputFields();
            $this->showModal();
            $this->emit('renderUpdatedData');
    }

    public function softDeletedBooks(){
        return view('livewire.trashed-books', [
            'roles' => Role::onlyTrashed()->get()
        ]);
    }


    public function render()
    {
        return view('livewire.roles');
    }
}
