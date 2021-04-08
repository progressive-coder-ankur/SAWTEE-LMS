<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use App\Models\User;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Illuminate\Support\Facades\Auth;

class TrashedContactsTable extends LivewireDatatable
{

    public function builder()
    {
        return Contact::query()->onlyTrashed()->leftjoin('users', 'users.id', 'contacts.updated_by');
    }

    public function showSwalModal()
    {
        $this->emit('swal:modal', [
            'type'  => 'success',
            'title' => 'Library',
            'icon' => 'success',
            'text'  => "Contact restored Successfully",
        ]);
    }
    public function showSwalModalCanceled()
    {
        $this->emit('swal:modal', [
            'type'  => 'success',
            'title' => 'Trashed Contacts',
            'icon' => 'success',
            'text'  => "Operation canceled , record is safe now.",
        ]);
    }

    public function showAlert()
    {
        $this->emit('swal:alert', [
            'type'    => 'success',
            'title'   => 'Libarary:',
            'text' => 'Contact Deleted Successfully',
            'icon' => 'success',
            'timeout' => 10000
        ]);
    }

    public function permanentDelete($id)
    {

         $contact = Contact::onlyTrashed()->find($id);
         $contact->forceDelete($id);
         $this->showAlert();
    }

    public function restoreDeleted($id)
    {
        $contact = Contact::onlyTrashed()->find($id)->restore($id);
        $this->showSwalModal();
    }

    public function columns()
    {
        return [

            // Column::checkbox()->label('Select All'),
            NumberColumn::name('id')
                ->label('Contact ID')->alignCenter()->linkTo('contact/show'),
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
            // })->label('maintainer')->alignCenter(),
            Column::name('user.name')->label('Deleted By')->alignCenter(),
            Column::name('title')
                ->label('Title'),
            Column::name('name')
                ->label('Name'),
            Column::name('designation')
                ->label('Designation'),
            Column::name('orgname')
                ->label('Org Name'),
            Column::name('email1')
                ->label('Primary Email'),
            Column::name('Country')
                ->label('Country'),
            Column::name('category')
                ->label('Category'),
            Column::name('list')
                ->label('List'),
            Column::name('mobile')
                ->label('Mobile'),
            Column::callback(['id'], function ($id) {
                return view('livewire.trashed-contacts-table-actions', ['id' => $id]);
            })
            ->label('Actions')

        ];
    }
}
