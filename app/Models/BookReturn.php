<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BookReturn extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->returned_to = Auth::user()->name;
            $model->user_id = Auth::id();
        });
    }
}
