<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class LeaveRequest extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function leaveApprovals()
    {
        return $this->belongsTo(LeaveApproval::class);
    }

    public function users()
    {
        return $this->belongTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->requested_by = Auth::user()->name;
            $model->user_id = Auth::user()->id;
        });
    }
}
