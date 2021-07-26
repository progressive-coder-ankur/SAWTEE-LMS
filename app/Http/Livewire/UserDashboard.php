<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Book;
use App\Models\Contact;
use App\Models\BookRequest;
use App\Models\BookIssued;
use App\Models\BookReturn;
use App\Models\Activity;
use App\Models\Event;


use Illuminate\Support\Facades\Auth;

class UserDashboard extends Component
{

    public function render()
    {
        $username = Auth::user()->name;
        $contact = Contact::all();
        $book = Book::all();
        $user = User::all();
        $events = Event::all();
        $today = date("F j, Y");
        $bookRequests = BookRequest::where('requested_by', $username);
        $activities = Activity::where('user_id', Auth::id())->with('activityable')->get();
        return view('livewire.user-dashboard', compact('book', 'contact', 'events', 'bookRequests', 'activities', 'user', 'today'));
    }
}
