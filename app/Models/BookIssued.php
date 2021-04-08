<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;

class BookIssued extends Model
{
    use HasFactory;
    use Notifiable;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function book_request(){
        return $this->belongsTo(BookRequest::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->issued_by = Auth::user()->name;
            $model->user_id = Auth::id();
        });
    }
}
