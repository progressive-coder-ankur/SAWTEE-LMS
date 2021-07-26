<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\EventList;
use App\Models\Event;
use App\Models\Activity;
use Illuminate\Support\Facades\Auth;
use Manny;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;


class EventsList extends Component
{
    public $user_id, $event_id, $event_name, $name, $designation, $mobile, $phone, $orgname, $gender, $email1, $fax;
    public $updateMode = false;
    public $show = false;
    public $event;
    protected $listeners = ['editList' => 'edit' ];
    public $rules = [
        'name' => 'required|string',
        'designation' => 'required|string',
        'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:17',
        'phone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:20',
        'orgname' => 'required|string',
    ];

    protected $message = [
        'name.required' => 'Name :attribute cannot be empty.',
        'designation.required' => 'The :attribute cannot be empty, Please Fill a designation.',
        'mobile.require' => 'The :attribute cannot be empty.',
        'phone.required' => ' The :attribute cannot be empty.',
        'mobile.regex' => 'The :attribute format is not valid, please check and try again.',
        'phone.regex' => 'The :attribute format is not valid, please check and try again.',
        'orgname.required' => 'The :attribute cannot be empty.',
    ];

    public function show(){
        $this->resetInput();
        $this->openModal();
    }

    public function openModal()
    {
        $this->show = true;
        // Clean errors if were visible before
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function closeModal(){
        $this->show = false;
    }

    public function updated($field){
        if($field == 'mobile') {
        $this->mobile = Manny::mask($this->mobile, "+111-111-1111-111");
        }
        elseif($field == 'phone'){
            $this->phone = Manny::mask($this->phone, "+111-111-1111-111" );
        }
    }

    public function resetInput()
    {
        $this->name = NULL;
        $this->designation = NULL;
        $this->mobile = NULL;
        $this->phone = NULL;
        $this->orgname = NULL;
        $this->gender = NULL;
        $this->fax = NULL;
        $this->email1 = NULL;
    }

    public function showModal()
    {
        $this->emit('swal:modal', [
            'type'  => 'success',
            'title' => 'Event',
            'icon' => 'success',
            'text'  => "Event List Updated Successfully",
        ]);
    }

    public function showAlert()
    {
        $this->emit('swal:alert', [
            'type'    => 'success',
            'title'   => 'Event',
            'text' => 'Event List Created Successfully',
            'icon' => 'success',
            'timeout' => 3000
        ]);
    }



    public function store()
    {
        $this->validate($this->rules, [
            'email1' => [
                'required',
                'email',
                Rule::unique('event_lists', 'email1'),
            ],

        ]);

        $data = array(
            'event_name' =>$this->event->title,
            'event_id' => $this->event->id,
            'name' => $this->name,
            'designation' => $this->designation,
            'mobile' => $this->mobile= Manny::mask($this->mobile, "+111-111-1111-111"),
            'phone' => $this->phone= Manny::mask($this->phone, "+111-111-1111-111"),
            'orgname' => $this->orgname,
            'gender' => $this->gender,
            'email1' => $this->email1,
            'fax' => $this->fax,
        );

        $eventlist = EventList::create($data);
        $activity = array(
            'title' => 'New participant added',
            'user_id' => Auth::id(),
        );
        $eventlist->activity()->create($activity);
        $this->resetInput();
        $this->showAlert();
        $this->emit('renderUpdatedData');

    }

    public function edit($id)

    {
        $data = EventList::findOrFail($id);
        $this->event_id = $data->event_id;
        $this->event_name = $data->event_name;
        $this->name = $data->name;
        $this->designation = $data->designation;
        $this->mobile = $data->mobile;
        $this->phone = $data->phone;
        $this->fax = $data->fax;
        $this->orgname = $data->orgname;
        $this->gender = $data->gender;
        $this->email1 = $data->email1;

        $this->updateMode = true;
        $this->show = true;
    }

    public function update()
    {

        $this->validate($this->rules, [
            'email1' => [
                'required',
                'email',
                Rule::unique('event_lists', 'email1'),
            ],

        ]);


        $eventList = EventList::find($this->event_id);
        $eventList -> update([
            'event_id' => $this->event_id,
            'event_name' => $this->event_name,
            'name' => $this->name,
            'designation' => $this->designation,
            'mobile' => $this->mobile= Manny::mask($this->mobile, "+111-111-1111-111"),
            'phone' => $this->phone= Manny::mask($this->phone, "+111-111-1111-111"),
            'orgname' => $this->orgname,
            'gender' => $this->gender,
            'email1' => $this->email1,
            'fax' => $this->fax,
        ]);
        $activity = array(
            'title' => 'Participant Edited',
            'user_id' => Auth::id(),
        );
        $eventList->activity()->create($activity);
        $this->updateMode = false;
        $this->show = false;
        $this->resetInput();
        $this->showModal();
        $this->emit('renderUpdatedData');


    }


    public function render()
    {
        return view('livewire.events-list');
    }
}
