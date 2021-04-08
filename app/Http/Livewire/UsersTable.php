<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Teams;
use Illuminate\Support\Facades\DB;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\TimeColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class UsersTable extends LivewireDatatable
{
    public $model = User::class;
    public $exportable = false;

    public function builder()
    {
        return User::query()
        ->leftJoin('teams', 'teams.user_id', 'users.current_team_id')
        ->leftJoin('user_roles', 'user_roles.user_id', 'user_roles.role_id');
    }

    public function columns()
    {
        return [
            Column::name('id')->label('ID')->alignCenter(),
            Column::name('name')->label('Name')->editable(),
            Column::name('email')->label('E-mail'),
            BooleanColumn::name('email_verified_at')->label('verified')->alignCenter(),
            Column::name('teams.name')->label('Team'),
            Column::name('roles.title')->label('Role'),
            DateColumn::name('updated_at')->label('Updated At'),
            Column::callback(['id'], function ($id) {
                return view('livewire.user-table-actions', ['id' => $id]);
            })
            ->label('Actions'),
        ];
    }



}
