<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;
use App\Models\User;
use App\Models\ContactCategory;
use App\Models\ContactList;
use App\Models\Activity;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Manny;
use Illuminate\Validation\Rule;

class Contacts extends Component
{
    use withPagination;

    public $updated_by, $created_by, $contact_id , $title, $name, $designation,$email1, $email2, $zip,  $category, $orgname, $orgdept, $orgaddress, $address1, $address2, $phone, $mobile, $city, $state, $country, $region, $fax, $pobox, $list, $gender, $ext, $language;
    public $updateMode = false;
    public $show= false;
    protected $listeners = ['editContact' => 'edit', 'showContact' =>'showContact'];

    protected $rules = [
        'title' => 'required',
        'name' => 'required|string',
        'designation' => 'required|string',
        'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:17',
        'phone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:20',
        'category' => 'required',
        'address1' => 'required|string|max:255',
        'pobox' => 'nullable|string',
        'orgname' => 'required|string',
        'gender' => 'required|string',
        'ext' => 'required_with:list,Staffs|digits:3',
    ];

    protected $messages = [

    ];

    public function mount()
    {
        $this->categories = ContactCategory::all();
        $this->lists = collect();
    }

    public function updatedSelectedCategory($category)
    {
        if(!is_null($category)){
            $this->lists = ContactList::where('category', $categrory)->get();
        }
    }

    public function render()
    {

        return view('livewire.contacts', [
            'contacts' => Contact::with('user')->orderBy('id', 'desc')->get()
        ]);
    }

    public function showContact($id)
    {

        $contact = Contact::find($id);
        return view('livewire.show-contact', compact('contact'));
    }

    public function updated($field){
        if($field == 'mobile') {
        $this->mobile = Manny::mask($this->mobile, "+111-111-1111-111");
        }
    }

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

    private function resetInput(){
        $this->title = null;
        $this->name = null;
        $this->designation = null;
        $this->category = null;
        $this->orgname = null;
        $this->orgdept = null;
        $this->orgaddress = null;
        $this->address1 = null;
        $this->address2 = null;
        $this->city = null;
        $this->state = null;
        $this->zip = null;
        $this->country = null;
        $this->phone = null;
        $this->mobile = null;
        $this->email1 = null;
        $this->email2 = null;
        $this->fax = null;
        $this->pobox = null;
        $this->gender = null;
        $this->list = null;
        $this->ext = null;
        $this->region = null;
        $this->language = null;


    }


    public function addContact(){
        $this->validate($this->rules, [
            'email1' => [
                'required',
                'email',
                Rule::unique('contacts', 'email1'),
            ],
            'email2' => [
                'required',
                'email',
                Rule::unique('contacts', 'email2'),
            ],

        ]);

        $data = array(
          'title' =>  $this->title,
          'name'=> $this->name,
          'designation' => $this->designation,
          'category'=> $this->category,
          'orgname' => $this->orgname,
          'orgdept' =>  $this->orgdept,
          'orgaddress' => $this->orgaddress,
          'address1' => $this->address1,
          'address2' => $this->address2,
          'city' =>  $this->city,
          'state' =>  $this->state,
          'zip' =>  $this->zip,
          'country' =>  $this->country,
          'phone' =>  $this->phone = Manny::mask($this->phone, "+111-111-1111-111"),
          'mobile' =>  $this->mobile = Manny::mask($this->mobile, "+111-111-1111-111"),
          'email1' =>  $this->email1,
          'email2' =>  $this->email2,
          'fax' =>  $this->fax,
          'pobox' =>  $this->pobox,
          'gender' => $this->gender,
          'list' =>  $this->list,
          'ext' =>  $this->ext,
          'region' =>  $this->region,
          'language' =>  $this->language,
        );

       $contact = Contact::create($data);
       $activity = array(
            'title' => 'New Contact Added',
            'user_id' => Auth::id(),
        );
        $contact->activity()->create($activity);
        $this->closeModal();
        $this->resetInput();
        $this->dispatchBrowserEvent('swal', [
            'title' => 'New Contact Created',
            'timer'=>3000,
            'toast' => true,
            'icon'=>'success',
            'timerProgressBar'=>true,
            'position'=>'top-right'
        ]);
        $this->emit('renderUpdatedData');
    }




    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        $this->contact_id = $id;
        $this->title = $contact->title;
        $this->name = $contact->name;
        $this->designation = $contact->designation;
        $this->category = $contact->category;
        $this->orgname = $contact->orgname;
        $this->orgdept = $contact->orgdept;
        $this->orgaddress = $contact->orgaddress;
        $this->address1 = $contact->address1;
        $this->address2 = $contact->address2;
        $this->email1 = $contact->email1;
        $this->email2 = $contact->email2;
        $this->city = $contact->city;
        $this->state = $contact->state;
        $this->region = $contact->region;
        $this->country = $contact->country;
        $this->zip = $contact->zip;
        $this->phone = $contact->phone;
        $this->mobile = $contact->mobile;
        $this->fax = $contact->fax;
        $this->pobox = $contact->pobox;
        $this->gender = $contact->gender;
        $this->ext = $contact->ext;
        $this->list = $contact->list;
        $this->language = $contact->language;
        $this->show = true;
        $this->updateMode = true;
    }


    public function update()
    {
        $this->validate($this->rules,[
            'email1' => [
                'required',
                'email',
                Rule::unique('contacts')->ignore($this->contact_id, 'id'),
            ],
            'email2' => [
                'required',
                'email',
                Rule::unique('contacts')->ignore($this->contact_id, 'id'),
            ],
        ]);

        if ($this->contact_id) {
            $contact = contact::find($this->contact_id);
            $contact->update([
                'title' =>  $this->title,
                'name'=> $this->name,
                'designation' => $this->designation,
                'category'=> $this->category,
                'orgname' => $this->orgname,
               'orgdept' =>  $this->orgdept,
               'orgaddress' => $this->orgaddress,
               'address1' => $this->address1,
               'address2' => $this->address2,
               'city' =>  $this->city,
               'state' =>  $this->state,
               'zip' =>  $this->zip,
               'country' =>  $this->country,
               'phone' =>  $this->phone,
               'mobile' =>  $this->mobile,
               'email1' =>  $this->email1,
               'email2' =>  $this->email2,
               'fax' =>  $this->fax,
               'pobox' =>  $this->pobox,
               'gender' => $this->gender,
               'list' =>  $this->list,
               'ext' =>  $this->ext,
               'region' =>  $this->region,
               'language' =>  $this->language,
            ]);
            $activity = array(
                'title' => 'Contact Edited',
                'user_id' => Auth::id(),
            );
            $contact->activity()->create($activity);
            $this->show = false;
            $this->updateMode = false;
            $this->resetInput();
            $this->emit('renderUpdatedData');
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Contact Updated',
                'text' => 'You have successfull updated the contact record.',
                'timer'=>3000,
                'icon'=>'success',
                'timerProgressBar' => true,
                'position'=>'center-center',

            ]);
        }
    }
    public function destroy($id)
    {
        if ($id) {
            $contact = contact::where('id', $id);
            $contact->delete();

        }
    }

}
