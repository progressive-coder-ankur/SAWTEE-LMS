<?php

namespace App\Http\Livewire;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Illuminate\Support\Facades\Auth;
use App\Models\BookRequest;

class UserBookRequestsTable extends LivewireDatatable
{
    public $model = BookRequest::class;
    protected $listeners = ['renderUpdatedData' => 'builder'];

    public function builder()
    {
        return BookRequest::query()->where('user_id', Auth::id())
        ->leftJoin('books', 'books.id', 'book_requests.book_id' );
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')->label('ID'),
            Column::name('book_name')->label('Book Title'),
            Column::name('books.bookCount')->label('Book Count'),
            Column::name('message')->label('Message'),
            BooleanColumn::name('issued')->label('Issued'),
            DateColumn::name('requested_at')->label('Requested At'),
        ];
    }
}
