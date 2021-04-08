<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;



class DashboardContactsTable extends LivewireDatatable
{
    public $model = Contact::class;
    public $selected = [];
    public $hideable = 'inline';
    public $exportable = false;


    public function builder()
    {
        return Contact::query();
    }


    public function columns()
    {
        //
        return [

            NumberColumn::name('id')
                ->label('Contact ID')->alignCenter()->linkTo('contact/show'),
            Column::name('name')
                ->label('Name'),
            Column::name('email1')
                ->label('Primary Email'),
            Column::name('category')
                ->label('Category'),
            Column::name('mobile')
                ->label('Mobile'),
            Column::name('orgname')->label('Org name')
        ];
    }
}
