<?php

namespace App\Http\Livewire;
use App\Models\Contact;
use Livewire\Component;

class TrashedContactsTableTop extends Component
{


    public function emptyTrash()
    {
        $contact_ids = Contact::onlyTrashed()->pluck('id')->toArray();
        Contact::whereIn('id', $contact_ids)->forceDelete();

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Trash Cleaned',
            'text' => 'Your trash has been cleaned.',
            'timer'=>3000,
            'icon'=>'success',
            'position'=>'center-center'
        ]);

        return redirect()->to('/contact/trashed');
    }

    public function restoreAll()
    {
        $contact_ids = Contact::onlyTrashed()->pluck('id')->toArray();
        Contact::whereIn('id', $contact_ids)->restore();

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Trash Restored',
            'text' => 'All records from your trash has been restored.',
            'timer'=>3000,
            'icon'=>'success',
            'position'=>'center-center'
        ]);

            return redirect()->to('/contact/trashed');
    }

    public function render()
    {
        return view('livewire.trashed-contacts-table-top');
    }
}
