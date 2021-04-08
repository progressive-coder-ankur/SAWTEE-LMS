<?php

namespace App\Http\Livewire;
use App\Models\Book;
use Livewire\Component;

class TrashedBooksTableTop extends Component
{

    public function emptyTrash()
    {
        $book_ids = Book::onlyTrashed()->pluck('id')->toArray();
        Book::whereIn('id', $book_ids)->forceDelete();

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Trash Cleaned',
            'text' => 'All records from your trash has been cleaned.',
            'timer'=>3000,
            'icon'=>'success',
            'position'=>'center-center'
        ]);

            return redirect()->to('/books/trashed');
    }

    public function restoreAll()
    {
        $book_ids = Book::onlyTrashed()->pluck('id')->toArray();
        Book::whereIn('id', $book_ids)->restore();

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Trash Restored',
            'text' => 'All records from your trash has been restored.',
            'timer'=>3000,
            'icon'=>'success',
            'position'=>'center-center'
        ]);

            return redirect()->to('/books/trashed');
    }


    public function render()
    {
        return view('livewire.trashed-table-top');
    }
}
