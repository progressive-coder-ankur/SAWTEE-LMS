<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\LeaveRequest;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;

class UsersOnLeave extends Component
{


    public function render()
    {

        $leave = LeaveRequest::whereDate('from','<=', now())->whereDate('to', '>=', now())->where('approved', 1)->get();
        return view('livewire.users-on-leave', compact('leave'));
    }
}
