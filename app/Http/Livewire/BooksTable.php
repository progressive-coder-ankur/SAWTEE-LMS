<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Book;
use App\Models\User;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Illuminate\Support\Facades\Auth;

class BooksTable extends LivewireDatatable
{
    public $selected = [];
    public $model = Book::class;
    protected $listeners = ['renderUpdatedData' => 'builder'];

    public function builder()
    {
        return Book::query()->leftJoin('users', 'users.id', 'books.created_by', 'books.updated_by');
    }


    public function editBook($id){
        $book = Book::find($id);
        $this->emit('editBook', $book->id);
    }


    public function deleteSelected(){
         $book_to_delete = $this->selected;
         Book::destroy($book_to_delete);
    }

    public function columns()
    {
        return [

            Column::checkbox()->label('Select ALL'),
            NumberColumn::name('id')
                ->label('ID')->alignCenter()->linkTo('book'),
            Column::name('title')
                ->label('Title')
                ->editable(),

            Column::name('users.name')->label('Created By')->alignCenter(),
            Column::name('updated_by')->label('Updated By')->alignCenter()->hide(),
            Column::name('author')
                ->label('Author')
                ->editable(),
            Column::name('shelf')
                    ->label('Shelf ID')
                    ->editable(),
            Column::name('ISBN')
                ->label('ISBN')
                ->editable(),
            Column::name('publisher')
                ->label('Publisher')
                ->editable()
                ->hide(),
            DateColumn::name('published_year')
            ->label('Year')->format('Y')
            ->hide(),
            Column::name('category')
                    ->label('Category'),
            Column::name('bookCount')
                ->label('Book Count')
                ->editable(),

            DateColumn::name('updated_at')
            ->label('Updated')
            ->hide(),

            Column::callback(['id'], function ($id) {
                return view('livewire.table-book-actions', ['id' => $id]);
            })
            ->label('Actions'),

        ];
    }

}
