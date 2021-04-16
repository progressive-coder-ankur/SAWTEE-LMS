<?php

namespace App\Http\Livewire;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use App\Models\LeaveApproval;
use App\Models\LeaveRequest;

class ApprovedLeavesTable extends LivewireDatatable
{
    public $model = LeaveApproval::class;
    public function builder()
    {
        return LeaveApproval::query()
        ->leftJoin('leave_requests', 'leave_requests.id', 'leave_approvals.request_id');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')->label('id'),
            Column::name('leave_requests.requested_by')->label('requested by'),
            Column::name('leave_requests.leave_type')->label('leave type'),
            Column::name('leave_requests.message')->label('message'),
            DateColumn::name('leave_requests.from')->label('Commencing from'),
            DateColumn::name('leave_requests.to')->label('to'),
            DateColumn::name('created_at')->label('created at'),
            DateColumn::name('updated_at')->label('updated at'),

        ];
    }
}
