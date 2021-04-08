<?php

namespace App\Http\Livewire;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Illuminate\Support\Facades\Auth;
use App\Models\BookReturn;

class BooksReturnedTable extends LivewireDatatable
{
    public $model = BookReturn::class;
    public $hideable = 'inline';
    public $exportable = true;
    public $searchable = 'returned_by, book_name';


    public function builder()
    {
        return BookReturn::query();
    }

    public function columns()
    {
        return
        [

            NumberColumn::name('id')->label('ID'),
            NumberColumn::name('issue_id')->label('Issue Id'),
            Column::name('returned_by')->label('Issued By'),
            Column::name('returned_to')->label('Issued To'),
            Column::name('book_name')->label('Book Name'),
            DateColumn::name('returned_date')->label('Returned Date'),
            BooleanColumn::name('returned')->label('Returned'),
            DateColumn::name('updated_at')->label('updated at'),
            DateColumn::name('created_at')->label('created at')

        ];
    }
}
