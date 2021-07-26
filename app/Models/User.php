<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Hash;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use softDeletes;
    use TwoFactorAuthenticatable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'last_login_at', 'last_login_ip',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function book()
    {
       return $this->hasMany(Book::class);
    }

    public function event()
    {
       return $this->hasMany(Event::class);
    }

    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }

    public function event_list()
    {
       return $this->hasMany(EventList::class);
    }


    public function book_request()
    {
       return $this->hasMany(BookRequest::class);
    }

    public function book_issued(){
       return $this->hasMany(BookIssued::class);
    }

    public function contact()
    {
       return $this->hasMany(Contact::class);
    }

    public function book_return()
    {
       return $this->hasMany(BookReturn::class);
    }

    public function leaveRequests()
    {
       return $this->hasMany(LeaveRequest::class);
    }

    public function leaveApprovals()
    {
       return $this->hasMany(leaveApproval::class);
    }

    public function getIsAdminAttribute()
    {
        return $this->roles()->where('id', 1)->exists();
    }

    public function getIsUserAttribute()
    {
        return $this->roles()->where('id', 2)->exists();
    }

    public function getIsApproverAttribute()
    {
        return $this->roles()->where('id', 3)->exists();
    }

    public function isAdmin()
    {
        $roles = Auth::check() ? Auth::user()->roles()->pluck('title')->toArray() : [];

        if (in_array('Admin', $roles)) {
          return;
        }
     }

     public function isApprover()
     {
         $roles = Auth::check() ? Auth::user()->roles()->pluck('title')->toArray() : [];

         if (in_array('Approver', $roles)) {
           return;
         }
      }

      public function isUser()
      {
          $roles = Auth::check() ? Auth::user()->roles()->pluck('title')->toArray() : [];

          if (in_array('User', $roles)) {
            return;
          }
       }


    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles');
    }

}
