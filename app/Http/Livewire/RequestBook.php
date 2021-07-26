<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Book;
use App\Models\User;
use App\Models\BookRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Events\BookRequested;



class RequestBook extends Component
{

    public $book_name, $requested_by, $request_id, $message, $requested_at, $issued, $book_id;
    public $show = false;
    protected $listeners = ['request' => 'request'];

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

    public function resetInputFields()
    {
        $this->book_name = '';
        $this->request_id = '';
        $this->message = '';
        $this->requestMode = false;
        $this->show = false;
        }


        public function showModal()
        {
            $this->emit('swal:modal', [
                'type'  => 'success',
                'title' => 'Library',
                'icon' => 'success',
                'text'  => "Book Request Sent Successfully",
                'timeout' => 3000
            ]);
        }


    public function updated($field){
        if($field == 'requested_by')
        {
            $this->requested_by = Auth::user()->name;
        }
    }


    public function request($id)
    {

        $book = Book::findOrFail($id);
        $this->book_id = $book->id;
        $this->book_name = $book->title;
        $this->requested_by = Auth::user()->name;
        $this->requestMode = true;
        $this->openModal();
    }


    public function requestBook()
    {
        $this->validate([
            'requested_by' => 'nullable',
            'book_name' => 'required|exists:books,title',
            'message' => 'nullable|string|max:255',
        ]);

        $data = array(
            'book_name' => $this->book_name,
            'book_id' => $this->book_id,
            'requested_by' => $this->requested_by,
            'message' => $this->message,
            'requested_at'=> Carbon::now(),
        );

        $request = BookRequest::create($data);
        $this->resetInputFields();
        $this->showModal();
        BookRequested::dispatch($request);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function autocomplete(Request $request)
    {
        $data = Book::select("title")
                ->where("title","LIKE","%{$request->query}%")
                ->get();

        return response()->json($data);
    }


    public function render()
    {
        return view('livewire.request-book');
    }
}
