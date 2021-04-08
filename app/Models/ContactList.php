<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactList extends Model
{
    use HasFactory; use softDeletes;

    protected $guarded =  [];

    public function contact_category(){
       return $this->belongsTo(ContactCategory::class);
    }
}
