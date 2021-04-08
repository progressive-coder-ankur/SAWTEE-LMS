<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function contact_list(){
       return $this->hasMany(ContactList::class);
    }

    public function contacts(){
        return $this->hasMany(Contact::class);
    }

}




