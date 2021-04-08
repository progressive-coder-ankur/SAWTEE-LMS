<?php

namespace App\Http\Livewire;

use App\Models\ContactCategory;
use App\Models\ContactList;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Illuminate\Support\Facades\Auth;

class ContactListsTable extends LivewireDatatable
{
    public $model = ContactList::class;
    public $hideable = "inline";

    public function builder()
    {
        return ContactList::query();
    }

    public function deleteSelected(){
        $list_to_delete = $this->selected;
        ContactList::destroy($list_to_delete);
   }

    public function columns()
    {
        return [
            // Column::checkbox()->label('Select All'),
            NumberColumn::name('id')->label('ID')->alignCenter(),
            Column::name('name')->label('List Name')->editable(),
            Column::name('category')->label('Category'),
            DateColumn::name('created_at')->label('created at'),
            DateColumn::name('updated_at')->label('created at'),
            Column::delete()->label('Delete')->alignCenter(),
        ];
    }
}
