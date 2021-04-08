<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory;
    use softDeletes;
    protected $guarded= [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function contact_category(){
        $this->belongsTo(ContactCategory::class);
    }

    public function activity()
    {
        return $this->morphMany(Activity::class, 'activityable');
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->created_by = Auth::id();
        });
        static::updating(function ($model) {
            $model->updated_by = Auth::id();
        });
    }
}
