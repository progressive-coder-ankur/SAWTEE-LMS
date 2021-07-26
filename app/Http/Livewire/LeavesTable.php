<?php

namespace App\Http\Livewire;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use App\Models\LeaveRequest;
use Illuminate\Support\Facades\Auth;


class LeavesTable extends LivewireDatatable
{
    public $model = LeaveRequest::class;
    protected $listeners = ['renderUpdatedData' => 'builder'];

    public function builder()
    {
        return LeaveRequest::query()->where('approved', 0);
    }

    public function approve($id)
    {
        $leave = LeaveRequest::findOrFail($id);
        $this->emit('approve', $leave->id);
    }



    public function columns()
    {
        if(Auth::user()->is_approver){
            return [
                NumberColumn::name('id')->label('id'),
                Column::name('requested_by')->label('requested by'),
                BooleanColumn::name('approved')->label('approved'),
                Column::name('leave_type')->label('leave type'),
                Column::name('message')->label('message'),
                DateColumn::name('from')->label('Commencing from'),
                DateColumn::name('to')->label('to'),
                DateColumn::name('created_at')->label('created at'),
                DateColumn::name('updated_at')->label('updated at'),

                Column::callback(['id'], function ($id) {
                    return view('livewire.table-leave-actions', ['id' => $id]);
                })
                ->label('Actions'),

            ];
        }
        else{
            return [
                NumberColumn::name('id')->label('id'),
                Column::name('requested_by')->label('requested by'),
                BooleanColumn::name('approved')->label('approved'),
                Column::name('leave_type')->label('leave type'),
                Column::name('message')->label('message'),
                DateColumn::name('from')->label('Commencing from'),
                DateColumn::name('to')->label('to'),
                DateColumn::name('created_at')->label('created at'),
                DateColumn::name('updated_at')->label('updated at'),
            ];
        }
    }
}
