<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class LeaveRequest extends Model
{
    use HasFactory;

    protected $guarded = [];



    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->requested_by = Auth::user()->name;
            $model->user_id = Auth::user()->id;
        });
    }
}
