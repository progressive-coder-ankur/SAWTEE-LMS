<?php

namespace App\Http\Livewire;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use App\Models\Role;


class RolesTable extends LivewireDatatable
{
    public $model = Role::class;
    public $hideable = 'inline';
    public $exportable = false;
    protected $listeners = ['renderUpdatedData' => 'builder'];
    public function builder()
    {
        return Role::query();
    }

    public function editRole($id)
    {
        $role = Role::findOrFail($id);
        $this->emit('editRole', $role->id);
    }

    public function columns()
    {
        return [
        NumberColumn::name('id')->label('id'),
        Column::name('title')->label('role'),
        Column::callback(['id'], function ($id) {
            return view('livewire.roles-table-actions', ['id' => $id]);
        })
        ->label('Actions')
    ];
    }
}
