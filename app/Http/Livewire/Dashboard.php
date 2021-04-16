<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Book;
use App\Models\Contact;
use App\Models\EventList;
use App\Models\Event;
use App\Models\BookRequest;
use App\Models\BookIssued;
use App\Models\Activity;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Events\BookIssue;


class Dashboard extends Component
{

    public $books, $users, $contacts, $request_id, $user_id, $issued, $issued_by, $issued_to, $bookCount, $issued_at, $return_date, $book_name, $book_id;
    public $show = false;
    public $eventList = [];
    public $selectedEvent = NULL;
    protected $listeners = ['issue' => 'issue' ];
    protected $rules = [
        'request_id' => "unique:book_issueds,request_id",
        'issued_by' => 'required|string',
        'issued_to' => 'required|string',
        'issued_at' => 'required',
        'return_date' => 'required',
    ];

    protected $message = [
        'request_id.unique' => 'This Book has already been issued.',
        'return_date.required' => ' Please fill the return date. '
    ];

    public function show()
    {
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
        // Clean errors if were visible before
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function resetInput()
    {
        $this->book_name = null;
        $this->issued = 0;
        $this->issued_to = null;
        $this->issued_at = null;
        $this->issued_by = null;
    }

    public function issue($id)
    {
        $request = BookRequest::findOrFail($id);
        $this->request_id = $request->id;
        $this->book_id = $request->book_id;
        $this->book_name = $request->book_name;
        $this->issued = $request->issued;
        $this->issued_to = $request->requested_by;
        $this->issued_at = Carbon::now()->format('Y/m/d');
        $this->issued_by = Auth::user()->name;
        $this->show = true;

    }

    public function issueBook()
    {
        $this->validate([
            'return_date' => 'required|date|after_or_equal:today',
        ]);

        $data = array(
            'issued_to' => $this->issued_to,
            'issued_at' => $this->issued_at,
            'return_date' => $this->return_date,
            'issued_by'  => $this->issued_by,
            'book_name' => $this->book_name,
            'request_id' => $this->request_id,
            'book_id' => $this->book_id,
        );

        $request = BookRequest::find($this->request_id);

        $this->issued = $request->issued;
        $this->issued = 1;
        $this->bookCount > 0 && $this->bookCount--;
        if($request){
            $request->issued = $this->issued;
            $request->save();
        }
        $book = Book::find($request->book_id);
        $this->bookCount = $book->bookCount;
        if($this->bookCount > 0){
            $this->bookCount--;
            $book->bookCount = $this->bookCount;
            $book->save();
            $issue = BookIssued::create($data);
            $this->show = false;
            $this->emit('renderUpdatedData');
            $this->resetInput();
            BookIssue::dispatch($issue, $request);
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Book Issued Successfully',
                'timer'=>3000,
                'toast' => true,
                'icon'=>'success',
                'timerProgressBar'=>true,
                'position'=>'top-right'
            ]);
        }
        else{
            $this->dispatchBrowserEvent('swal', [
                'title' => 'Book cannot be issued',
                'timer'=>3000,
                'toast' => true,
                'icon'=>'info',
                'timerProgressBar'=>true,
                'position'=>'top-right'
            ]);
        }
    }

    public function updatedSelectedEvent($event_name)
    {
        if(!is_null($event_name)){
            $this->eventList = EventList::where('event_name', $event_name)->get();
        }

    }


    public function render()
    {
        $eventName = $this->selectedEvent;
        $event_list = $this->eventList;
        $participants = EventList::all();
        $events = Event::all();
        $contact = Contact::all();
        $book = Book::all();
        $user = User::all();
        $today = date("F j, Y");
        $female = $contact->where('gender', 'Female')->count();
        $male = $contact->where('gender', 'Male')->count();
        $bookRequests = BookRequest::with('user')->get();
        $bookIssued = BookIssued::all();
        $activities = Activity::where('user_id', Auth::id())->with('activityable')->get();


        return view('livewire.dashboard', compact('book', 'user', 'events',  'contact', 'female', 'male', 'bookRequests', 'bookIssued', 'today', 'participants', 'eventName', 'event_list', 'activities'));
    }

}




