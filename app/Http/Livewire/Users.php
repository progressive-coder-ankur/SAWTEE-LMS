<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Users extends Component
{
    protected $listeners = ['showUser' =>'showUser'];

    public function showUser($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }


    public function render()
    {
        return view('livewire.users');
    }
}
