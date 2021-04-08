<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Event extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function eventList()
    {
        return $this->hasMany(EventList::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->created_by = Auth::user()->name;
            $model->updated_by = null;

        });
        static::updating(function ($model) {
            $model->updated_by = Auth::user()->name;
        });
    }
}
