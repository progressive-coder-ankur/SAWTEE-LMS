<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class LeaveApproval extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function leaveRequests()
    {
        return $this->hasOne(LeaveRequest::class);
    }

    public function users()
    {
        return $this->belongTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->approved_by = Auth::user()->name;
            $model->approver_id = Auth::user()->id;
        });
    }
}
