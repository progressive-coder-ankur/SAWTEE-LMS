<?php

namespace App\Http\Livewire;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;

class EventsTable extends LivewireDatatable
{
    public $model = Event::class;
    public $searchable = true;
    public $exportable = true;
    public $hideable = 'inline';

    protected $listeners = ['renderUpdatedData' => 'builder'];

    public function builder()
    {
        return Event::query();
    }

    public function edit($id)
    {
        $data = Event::find($id);
        $this->emit('edit', $data->id);
    }

    public function Eventid($id)
    {
        $data = Event::find($id);
        $this->emit('emit', $data->id);
        return redirect()->route('event.show', $data->id);
    }


    public function columns()
    {
        return [
            NumberColumn::name('id')->label('ID'),
            Column::name('title')->label('event Name')->editable(),
            Column::name('created_by')->label('Creator'),
            Column::name('updated_by')->label('Updator'),
            Column::callback(['id'], function ($id) {
                return view('livewire.events-table-actions', ['id' => $id]);
            })
            ->label('Actions')

            ];
    }
}
