<?php

namespace App\Http\Livewire;

use App\Models\Leave;
use Livewire\Component;
use App\Models\LeaveRequest;
use App\Models\LeaveApproval;
use Illuminate\Support\Carbon;
use App\Events\LeaveRequested;
use App\Events\LeaveApproved;


class Leaves extends Component
{

    public $title, $user_id, $leave_id, $requested_by, $from, $to, $message,  $approved;
    public $leave_type;
    public $show = false;
    public $sick_leave = 12;
    public $festive_leave = 3;
    public $mourning_leave = 15;
    public $annual_leave = 24;
    public $leave_balance;


    protected $listeners = ['approve' => 'approve'];

    protected $rules = [
        'title' => 'required|max:255|string',
        'from' => 'required|date|after:today',
        'to' => 'required|date|after:today',
        'message' => 'required|string',
        'leave_type' => 'required|string',
    ];

    protected $messages = [
        'title.required' => 'The attribute: cannot be empty.',
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
    }

    private function resetInputFields()
    {
        $this->title = null;
        $this->requested_by = null;
        $this->from = Carbon::now()->toDateString();
        $this->to = Carbon::now()->toDateString();
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
        $this->validate($this->rules);

        $data = array(
            'title' => $this->title,
            'from' => $this->from,
            'to' => $this->to,
            'leave_type' => $this->leave_type,
            'message' => $this->message,
        );

        $leave = LeaveRequest::create($data);
        $this->resetInputFields();
        LeaveRequested::dispatch($leave);
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
        $this->leave_id = $leave->id;
        $this->user_id = $leave->user_id;
        $this->leave_balance = $this->sick_leave + $this->festive_leave + $this->mourning_leave + $this->annual_leave;
        $this->approved = 1;
        $this->leave_type = $leave->leave_type;

        if($this->leave_type === 'Sick'){
            $this->sick_leave --;
        }
        elseif ($this->leave_type === 'Festive'){
            $this->festive_leave --;
        }

        elseif($this->leave_type === 'Annual'){
            $this->annual_leave --;
        }

        else{ $this->mourning_leave --;}


        if($this->leave_id)
        {
            $leave->update([
               'approved' => $this->approved
            ]);

            $data = array(
                'request_id' => $this->leave_id,
            );
            $approved = LeaveApproval::create($data);
            if($this->leave_type) {
                $value = array(
                    'request_id' => $this->leave_id,
                    'annual_leave' => $this->annual_leave,
                    'sick_leave' => $this->sick_leave,
                    'festive_leave' => $this->festive_leave,
                    'mourning_leave' => $this->mourning_leave,
                    'leave_balance' => $this->leave_balance -1,
                    'approved' => $this->approved,
                );
                $leave_balance = Leave::create($value);
            }
            LeaveApproved::dispatch($approved, $leave);
            $this->showModal();
        }

        $this->emit('renderUpdatedData');


    }
}
