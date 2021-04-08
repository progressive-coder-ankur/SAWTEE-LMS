<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\User;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Illuminate\Support\Facades\Auth;

class BookRequestTable extends LivewireDatatable
{

    public $model = Book::class;


    public function builder()
    {
        return Book::query();
    }

    public function showModal()
    {
        $this->emit('swal:modal', [
            'type'  => 'error',
            'title' => 'Book Request',
            'icon' => 'info',
            'text'  => "Sorry the book is currently unavailable",
        ]);
    }


    public function request($id){
        $book = Book::find($id);

        if($book->bookCount > 0)
        {
            $this->emit('request', $book->id);
        }
        else
        {
            $this->showModal();
        }
    }

    public function columns()
    {
        return [

            NumberColumn::name('id')
                ->label('ID')->alignCenter()->linkTo('book'),
            Column::name('title')
                ->label('Title')
                ,
            Column::name('author')
                ->label('Author')
                ,
            Column::name('shelf')
                    ->label('Shelf ID')
                    ,
            Column::name('ISBN')
                ->label('ISBN')
                ,
            Column::name('publisher')
                ->label('Publisher')

                ->hide(),
            DateColumn::name('published_year')
            ->label('Year')->format('Y')
            ->hide(),
            Column::name('category')
                    ->label('Category'),
            Column::name('bookCount')
                ->label('Book Count')
                ,
            DateColumn::name('updated_at')
            ->label('Updated')
            ->hide(),

            Column::callback(['id'], function ($id) {
                return view('livewire.book-request-table-actions', ['id' => $id]);
            })
            ->label('Actions'),

        ];
    }
}
