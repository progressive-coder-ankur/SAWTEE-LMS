<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\BookIssued;
use App\Models\BookReturn;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class BooksIssued extends Component
{

    public $issue_id, $book_name, $returned, $returned_to, $returned_by, $returned_date, $issued_at, $book_id, $bookCount ;
    public $show = false;
    protected $listeners = ['return' => 'return'];
    protected $rules = [
        'issue_id' => "unique:book_returns,issue_id",
        'returned_by' => 'required|string',
        'returned_to' => 'required|string',
        'returned_date' => 'required|date|after:issued_at',
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
        $this->issue_id = '';
        $this->returned_by = '';
        $this->returned_to = '';
        $this->book_name = '';
        $this->returned_date = '';

    }

    public function return($id)
    {
        $data = BookIssued::find($id);
        $this->issue_id = $data->id;
        $this->issued_at = $data->issued_at;
        $this->book_name = $data->book_name;
        $this->returned_to = Auth::user()->name;
        $this->returned_by = $data->issued_to;
        $this->returned_date = Carbon::now()->format('Y/m/d');
        $this->book_id = $data->book_id;

        $this->show = true;
    }



    public function returnBook()
    {
        $this->validate();

        $return = array(
            'returned_by' => $this->returned_by,
            'returned_to' => $this->returned_to,
            'book_name'   => $this->book_name,
            'issued_at' => $this->issued_at,
            'issue_id' => $this->issue_id,
            'returned_date' => $this->returned_date,
            'returned' => 1,
        );

        $returnedBook = BookReturn::create($return);
        $this->show=false;
        $this->returned = 1;
        $returned = BookIssued::find($this->issue_id);
        if($returned){
            $returned->returned = $this->returned;
            $returned->save();
        }

        $book = Book::find($this->book_id);
        $this->bookCount = $book->bookCount;
        $this->bookCount++;
        if($book){
        $book->bookCount = $this->bookCount;
        $book->save();
        }
        $this->emit('renderUpdatedData');

        $this->showAlert();
    }

    public function showModal()
    {
        $this->emit('swal:modal', [
            'type'  => 'success',
            'title' => 'Library',
            'icon' => 'success',
            'text'  => "Book Updated Successfully",
        ]);
    }

    public function showAlert()
    {
        $this->emit('swal:alert', [
            'type'    => 'success',
            'title'   => 'Libarary:',
            'text' => 'Book Returned Successfully',
            'icon' => 'success',
            'timeout' => 3000
        ]);
    }


    public function render()
    {
        return view('livewire.books-issued', [
            'issuedBook' => BookIssued::with('user')->with('book_request')->get()
        ]);
    }
}
