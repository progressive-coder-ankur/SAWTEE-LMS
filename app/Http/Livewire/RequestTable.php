<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\BookRequest;
use App\Models\BookIssued;
use App\Models\User;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Illuminate\Support\Facades\Auth;

class RequestTable extends LivewireDatatable
{
    public $model = BookRequest::class;
    protected $listeners = ['renderUpdatedData' => 'builder'];

    public function builder()
    {
        return BookRequest::query()->where('issued', '0')
        ->leftJoin('books', 'books.id', 'book_requests.book_id' );
    }

    public function issue($id){
        $request = BookRequest::find($id);
        $this->emit('issue', $request->id);
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')->label('ID'),
            Column::name('requested_by')->label('Requested By'),
            Column::name('book_name')->label('Book Title'),
            Column::name('books.bookCount')->label('Book Count'),
            Column::name('message')->label('Message'),
            BooleanColumn::name('issued')->label('Issued'),
            DateColumn::name('requested_at')->label('Requested At'),
            Column::callback(['id'], function ($id) {
                return view('livewire.request-table-actions', ['id' => $id]);
            })
            ->label('Actions'),

        ];
    }
}
