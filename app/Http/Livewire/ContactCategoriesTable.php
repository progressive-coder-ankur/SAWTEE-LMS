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

class ContactCategoriesTable extends LivewireDatatable
{
    public $model = ContactCategory::class;
    public $hideable = "inline";

    public function builder()
    {
        return ContactCategory::query();

    }

    public function columns()
    {
        return [
            NumberColumn::name('id')->label('ID')->alignCenter(),
            Column::name('name')->label('Category Name')->editable(),
            DateColumn::name('created_at')->label('created at'),
            DateColumn::name('updated_at')->label('created at'),
            Column::delete()->label('Delete')->alignCenter(),

        ];
    }
}
