<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\BookRequest;
use App\Models\BookIssued;
use App\Models\BookReturn;
use App\Models\User;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Illuminate\Support\Facades\Auth;

class IssuedBooksTable extends LivewireDatatable
{

    public $model = BookIssued::class;
    public $hideable = 'inline';
    public $searchable = 'book_name,issued_to';
    public $exportable = false;

    protected $listeners = ['renderUpdatedData' => 'builder'];

    public function builder()
    {
        return BookIssued::query()->where('returned', 0);
    }



    public function return($id)
    {
        $this->emit('return', $id);

    }




    public function columns()
    {
        return [
        NumberColumn::name('id')->label('ID'),
        NumberColumn::name('request_id')->label('Request Id'),
        Column::name('issued_by')->label('Issued By'),
        Column::name('issued_to')->label('Issued To'),
        Column::name('book_name')->label('Book Name'),
        DateColumn::name('issued_at')->label('Issued Date'),
        BooleanColumn::name('returned')->label('Returned'),
        DateColumn::name('return_date')->label('Return Date'),
        Column::callback(['id'], function ($id) {
            return view('livewire.issued-books-table-actions', ['id' => $id]);
        })
        ->label('Actions'),
        ];
    }
}
