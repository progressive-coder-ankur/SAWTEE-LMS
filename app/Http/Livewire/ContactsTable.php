<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;
use App\Models\User;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Illuminate\Support\Facades\Auth;


class ContactsTable extends LivewireDatatable
{
    public $model = Contact::class;
    public $selected = [];
    public $hideable = 'inline';
    public $exportable = false;
    protected $listeners = ['renderUpdatedData' => 'builder'];

    public function builder()
    {
        return Contact::query();
    }

    public function editContact($id)
    {
        $contact = Contact::find($id);
        $this->emit('editContact', $contact->id);
    }

    public function deleteSelected()
    {
        $contacts_to_delete = $this->selected;
        Contact::destroy($contacts_to_delete);
    }

    public function columns()
    {
        //
        return [
            Column::checkbox()
                ->label('Select All')
                ,
            NumberColumn::name('id')
                ->label('Contact ID')->alignCenter()->linkTo('contact/show'),
            Column::name('created_by')->label('created by')->alignCenter(),
            Column::name('title')
                ->label('Title')
                ->editable(),
            Column::name('name')
                ->label('Name')
                ->editable(),
            Column::name('designation')
                ->label('Designation')
                ->editable(),
            Column::name('orgname')
                ->label('Org Name')
                ->editable(),
            Column::name('email1')
                ->label('Primary Email')
                ->editable(),
            Column::name('Country')
                ->label('Country')
                ->editable(),
            Column::name('category')
                ->label('Category')
                ->editable(),
            Column::name('list')
                ->label('List')
                ->editable(),
            Column::name('mobile')
                ->label('Mobile')
                ->editable(),

            Column::callback(['id'], function ($id) {
                return view('livewire.contact-table-actions', ['id' => $id]);
            })
            ->label('Actions')

        ];
    }

    public function getUsersProperty()
    {
        return User::pluck('name');
    }
}
