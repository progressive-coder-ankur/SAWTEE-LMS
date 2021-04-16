<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\LeaveRequest;
use App\Models\LeaveApproval;
use Illuminate\Support\Carbon;



class Leaves extends Component
{

    public $title, $user_id, $leave_id, $requested_by, $from, $to, $message, $approved_by, $leave_type, $approved;
    public $show = false;

    public function mount(){
        $this->from = Carbon::now();
        $this->to = Carbon::now();
    }

    protected $listeners = ['approve' => 'approve'];

    protected $rules = [
        'title' => 'required|max:255|string',
        'from' => 'required|date|after:today',
        'to' => 'required|date|after:today',
        'message' => 'required|string',
        'leave_type' => 'required|string',
    ];


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

    private function resetInputFields()
    {
        $this->title = null;
        $this->requested_by = null;
        $this->leave_type = null;
        $this->message = null;
        $this->show= false;
    }


    public function showModal()
    {
        $this->emit('swal:modal', [
            'type'  => 'success',
            'title' => 'Leave Request',
            'icon' => 'success',
            'text'  => "Leave Request has been approved",
        ]);
    }

    public function showAlert()
    {
        $this->emit('swal:alert', [
            'type'    => 'success',
            'title'   => 'Leave Request',
            'text' => 'New leave request sent',
            'icon' => 'success',
            'timeout' => 3000
        ]);
    }

    public function render()
    {
        return view('livewire.leaves');
    }


    public function request()
    {
        $this->validate();

        $data = array(
            'title' => $this->title,
            'user_id' => $this->user_id,
            'requested_by' => $this->requested_by,
            'from' => $this->from,
            'to' => $this->to,
            'leave_type' => $this->leave_type,
            'message' => $this->message,
        );

        $leave = LeaveRequest::create($data);
        $this->resetInputFields();
        $this->showAlert();
        $this->emit('renderUpdatedData');
    }


    public function edit($id)
    {
        $leave = LeaveRequest::findOrFail($id);
        $this->leave_id = $leave->id;
        $this->title = $leave->title;
        $this->requested_by = $leave->requested_by;
        $this->leave_type = $leave->leave_type;
        $this->from = $leave->from;
        $this->to = $leave->to;
        $this->message = $leave->message;
        $this->updateMode = true;
    }


    public function update()
    {
        $this->validate();


        if($this->leave_id){
            $leave = LeaveRequest::find($this->leave_id);
            $leave->update([
                'title' => $this->title,
                'requested_by' =>$this->requested_by,
                'leave_type' =>$this->leave_type,
                'from' => $this->from,
                'to' => $this->to,
                'message' => $this->message,

            ]);
            $this->resetInputFields();
            $this->showModal();
            $this->emit('renderUpdatedData');
        }
    }

    public function approve($id)
    {
        $leave = LeaveRequest::findOrFail($id);
        $data = array(
            'request_id' => $leave->id,
        );
        $this->leave_id = $leave->id;
        $this->approved = 1;
        if($this->leave_id)
        {
            $leave->update([
               'approved' => $this->approved
            ]);

            $data = array(
                'request_id' => $this->leave_id,
            );
            $approved = LeaveApproval::create($data);
            $this->showModal();
        }

        $this->emit('renderUpdatedData');


    }
}
