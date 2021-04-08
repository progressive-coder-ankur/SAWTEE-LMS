<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;


class Book extends Model
{
    use HasFactory;
    use softDeletes;
    use Notifiable;

    protected $guarded = [];

    protected $casts = [
        'name' => 'string',
    ];

    protected $morphClass = 'Book';

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function bookIssueds(){
        return $this->hasMany(BookIssued::class);
    }

    public function bookRequests()
    {
        return $this->hasMany(BookRequest::class);
    }

    public function activity()
    {
        return $this->morphMany(Activity::class, 'activityable');
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->created_by = Auth::user()->id;
            $model->updated_by = Auth::user()->id;
        });
        static::updating(function ($model) {
            $model->updated_by = Auth::user()->id;
        });
    }
}
