<?php

namespace App\Http\Livewire;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use App\Models\LeaveRequest;
use Illuminate\Support\Facades\Auth;

class UserLeaveTable extends LivewireDatatable
{
    public $searchable = 'leave_type, approved';
    public $hideable = 'inline';
    public $model = LeaveRequest::class;
    protected $listeners = ['renderUpdatedData' => 'builder'];

    public function builder()
    {
        return LeaveRequest::query()->where('user_id', Auth::user()->id);
    }

    public function edit($id)
    {
        $leave = LeaveRequest::findOrFail($id);
        $this->emit('edit', $leave->id);
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')->label('id'),
            BooleanColumn::name('approved')->label('approved'),
            Column::name('leave_type')->label('leave type'),
            Column::name('message')->label('message'),
            DateColumn::name('from')->label('Commencing from'),
            DateColumn::name('to')->label('to'),
            DateColumn::name('created_at')->label('created at'),
            DateColumn::name('updated_at')->label('updated at'),
            Column::callback(['id'], function ($id) {
                return view('livewire.user-leave-table-actions', ['id' => $id]);
            })
            ->label('Actions'),
        ];
    }
}
