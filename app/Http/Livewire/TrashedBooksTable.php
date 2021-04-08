<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Book;
use App\Models\User;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Illuminate\Support\Facades\Auth;

class TrashedBooksTable extends LivewireDatatable
{

    public $hideable = 'inline';
    public $exportable = false;
    // public $beforeTableSlot = 'components.table-top';

    public function builder()
    {
        return Book::query()->onlyTrashed()->leftjoin('users', 'users.id', 'books.updated_by');
    }


    public function showSwalModal()
    {
        $this->emit('swal:modal', [
            'type'  => 'success',
            'title' => 'Library',
            'icon' => 'success',
            'text'  => "Book restored Successfully",
        ]);
    }

    public function showSwalModalCanceled()
    {
        $this->emit('swal:modal', [
            'type'  => 'success',
            'title' => 'Trashed Books',
            'icon' => 'success',
            'text'  => "Operation canceled , record is safe now.",
        ]);
    }

    public function showAlert()
    {
        $this->emit('swal:alert', [
            'type'    => 'success',
            'title'   => 'Libarary:',
            'text' => 'Book Deleted Successfully',
            'icon' => 'success',
            'timeout' => 10000
        ]);
    }

    public function permanentDelete($id)
    {
         $book = Book::onlyTrashed()->find($id);
         $book->forceDelete($id);
         $this->showAlert();
    }

    public function restoreDeleted($id)
    {
        $book = Book::onlyTrashed()->find($id)->restore($id);
        $this->showSwalModal();
    }

    public function columns()
    {
        return [

            NumberColumn::name('id')
                ->label('book id')->alignCenter(),

            Column::name('title')
                ->label('Title')
                ,
                // Column::callback(['user.name', 'user.profile_photo_path'], function ($userName, $userPic) {
                //     return '
                //     <div class="flex items-center h-full">
                //     <div class="w-12 h-12">
                //         <img
                //             src="/storage/'.$userPic.'"
                //             alt="'.$userName.'"
                //             class="w-full h-full overflow-hidden rounded-full shadow"
                //         />
                //     </div>
                //     <p class="ml-2 text-sm leading-4 tracking-normal text-gray-800">'.$userName.'</p>
                // </div>
                // ';
                // })->label('deleted by')->alignCenter(),
            Column::name('user.name')->label('Deleted By')->alignCenter(),

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
            ->label('Year')
            ->hide(),
            Column::name('category')
                    ->label('Category'),

            Column::callback(['id'], function ($id) {
                return view('livewire.trashed-books-table-actions', ['id' => $id]);
            })
            ->label('Actions')

        ];
    }

    public function getUsersProperty()
    {
        return User::pluck('name');
    }
}
