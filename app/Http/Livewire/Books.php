<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Manny;

class Books extends Component
{
    public $title, $author,  $publisher, $ISBN, $category, $updated_by, $created_by, $published_year, $shelf, $book_id;
    public $updateMode = false;
    public $show = false;
    public $bookCount = 1;
    protected $listeners = [ 'editBook' => 'edit'];
    protected $rules = [
        'title' => 'required|max:255|string',
        'category' => 'required',
        'shelf' => 'required|alpha_dash',
        'bookCount' => 'required|numeric',
        'published_year' => 'digits:4',
        'ISBN' => 'nullable|alpha_dash:17',
    ];

    protected $message = [
        'title.required' => 'Title :attribute cannot be empty.',
        'category.required' => 'The :attribute cannot be empty, Please Choose a Category.',
        'shelf.required' => 'Shelf Id cannot be empty, Please fill correct data.',
        'bookCount.require' => 'The :attribute cannot be empty.',
        'bookCount.numeric' => ' The :attribute format is not valid, please check and try again.',
        'ISBN.numeric' => 'The :attribute format is not valid, Must be  a 13 digit number please check and try again.',
        'ISBN.required' => 'ISBN number is required.'
    ];

    public function render()
    {
        return view('livewire.books');
    }


    public function updated($field)
    {
        if ($field == 'ISBN')
        {
            $this->ISBN = Manny::mask($this->ISBN, "111-11-11111-11-1");
        }

        if ($field == 'shelf')
        {
            $this->shelf = Manny::mask($this->shelf, "AA-A-A-111");
        }

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
            'text' => 'New book added to library',
            'icon' => 'success',
            'timeout' => 3000
        ]);
    }

    public function showConfirmation()
    {
        $this->emit("swal:confirm", [
            'type'        => 'success',
            'title'       => 'Book Updated',
            'text'        => "Book Updated Successfully",
            'showDenyButton' => false,
            'confirmText' => 'OK',
            'method'      => 'refreshTable',
            'params'      => [], // optional, send params to success confirmation
            'callback'    => '', // optional, fire event if no confirmed
        ]);
    }


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
        $this->title = '';
        $this->author = '';
        $this->shelf = '';
        $this->publisher = '';
        $this->ISBN = '';
        $this->bookCount = 1;
        $this->category = '';
        $this->published_year = '';
        $this->updateMode = false;
        $this->show= false;
    }

    public function addBook()
    {
        $this->validate();

        $data = array(
            'title' => $this->title,
            'author' => $this->author,
            'shelf' => $this->shelf = Manny::mask($this->shelf, "AA-A-A-111"),
            'publisher' => $this->publisher,
            'published_year' => $this->published_year,
            'category' => $this->category,
            'bookCount' => $this->bookCount,
            'ISBN' => $this->ISBN =Manny::mask($this->ISBN, "111-11-11111-11-1"),

        );

        $book = Book::create($data);
        $activity = array(
            'title' => 'New Book Added',
            'user_id' => Auth::id(),
        );

        $book->activity()->create($activity);
        $this->resetInputFields();
        $this->showAlert();
        $this->emit('renderUpdatedData');
    }


    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $this->book_id = $id;
        $this->title = $book->title;
        $this->author = $book->author;
        $this->shelf = $book->shelf;
        $this->publisher = $book->publisher;
        $this->published_year = $book->published_year;
        $this->category = $book->category;
        $this->bookCount = $book->bookCount;
        $this->ISBN = $book->ISBN;
        $this->updated_by = $book->updated_by;
        $this->show = true;
        $this->updateMode = true;
    }


    public function update()
    {
        $this->validate();


            $book = Book::find($this->book_id);

            $book->update([
                'title' => $this->title,
                'author' => $this->author,
                'shelf' => $this->shelf = Manny::mask($this->shelf, "AA-A-A-111"),
                'publisher' => $this->publisher,
                'published_year' => $this->published_year,
                'category' => $this->category,
                'bookCount' => $this->bookCount,
                'ISBN' => $this->ISBN = Manny::mask($this->ISBN, "111-11-11111-11-1"),

            ]);

            $this->resetInputFields();
            $this->showModal();
            $this->emit('renderUpdatedData');
    }

    public function softDeletedBooks(){
        return view('livewire.trashed-books', [
            'books' => Book::onlyTrashed()->get()
        ]);
    }

    public function increment(){
        $this->bookCount++;
    }

    public function decrement(){
        $this->bookCount > 0 && $this->bookCount--;
    }

}
