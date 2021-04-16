<?php

namespace App\Http\Livewire;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Illuminate\Support\Facades\Auth;
use App\Models\EventList;


class EventParticipantListTable extends LivewireDatatable
{
    public $model = EventList::class;
    public $event;
    public $exportable = true;
    public $searchable = 'name';
    public $hideable = 'inline';

    protected $listeners = ['renderUpdatedData' => 'builder'];

    public function builder()
    {
        return EventList::query()->where('event_id', $this->event->id);
    }

    public function editList($id)
    {
        $participant = EventList::find($id);
        $this->emit('editList', $participant->id);
    }


    public function columns()
    {
        return [
        NumberColumn::name('id')->label('ID'),
        NumberColumn::name('event_id')->label('event id'),
        Column::name('event_name')->label('event name'),
        Column::name('name')->label('name'),
        Column::name('designation')->label('designation'),
        Column::name('orgname')->label('orgname'),
        NumberColumn::name('phone')->label('phone')->hide(),
        NumberColumn::name('mobile')->label('mobile'),
        NumberColumn::name('fax')->label('fax')->hide(),
        Column::name('gender')->label('gender')->hide(),
        Column::name('email1')->label('e-mail'),
        Column::callback(['id'], function ($id) {
            return view('livewire.events-list-table-actions', ['id' => $id]);
        })
        ->label('Actions')

        ];
    }
}
