<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class AllowedAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $userRole = Auth::check() ? Auth::user()->roles->pluck('title')->toArray() : [];
        //dd($userRole);
        $currentRouteName = Route::currentRouteName();
        //dd($currentRouteName);

        try{
            if(in_array($currentRouteName, $this->userAccessRole()[$userRole])){
                return $next($request);
            }
            else
            {
                abort(403, 'You are not authorized for this action.');
            }
        }

        catch(\Throwable $th) {
            abort(403, ' Access Denied.');
        }

    }

    public function userAccessRole()
    {
        return [
            'User' => [
                'user-dashboard',
                'request.book'
            ],

            'Admin' => [
                'dashboard',
                'users',
                'library',
                'contact',
                'books.deleted',
                'contact.deleted',
                'contact.categories',
                'contact.lists',
                'deleted.lists',
                'issued.books',
                'returned.books',
                'event.list',
            ],
        ];

    }
}
