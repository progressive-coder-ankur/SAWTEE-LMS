<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Books;
use App\Http\Livewire\Contacts;
use App\Http\Livewire\RequestBook;
use App\Http\Livewire\Events;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::group(['middleware' => [
    'auth:sanctum',
    'verified',


    ], 'prefix' => 'admin'], function () {

        Route::get('/users', function () {
            return view('users.index');
        })->name('users');

        Route::get('/books', function () {
            return view('library.index');
        })->name('library');


        Route::get('/contact', function () {
            return view('contact.index');
        })->name('contact');

        Route::get('/books/trashed', function () {
            return view('library.deleted-books');
        })->name('books.deleted');

        Route::get('/contact/show/{id}',[Contacts::class, 'showContact'])->name('contact.show');

        Route::get('/contact/trashed', function () {
            return view('contact.deleted-contacts');
        })->name('contact.deleted');


        Route::get('/contact/categories', function () {
            return view('contact.categories');
        })->name('contact.categories');

        Route::get('/contact/lists', function () {
            return view('contact.lists');
        })->name('contact.lists');

        Route::get('/contact/lists/trashed', function () {
            return view('contact.deleted-lists');
        })->name('deleted.lists');


        Route::get('/books/issued-books', function () {
            return view('library.issued-books');
        })->name('issued.books');

        Route::get('/books/returned-books', function () {
            return view('library.returned-books');
        })->name('returned.books');

        Route::get('/events', function () {
            return view('event.event');
        })->name('events');

        Route::get('/events/show/{id}',[Events::class, 'showEvent'])->name('event.show');

        Route::get('/event-list', function () {
            return view('event.event-list');
        })->name('event.list');


        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::get('/roles', function () {
            return view('users.roles');
        })->name('user.roles');

        Route::get('/roles/deleted', function () {
            return view('users.deleted-roles');
        })->name('roles.deleted');

        Route::get('/mark-all-read', function(){
            auth()->user()->unreadNotifications->markAsRead();
            return redirect()->back();
        })->name('admin.markall');
});

Route::group(['middleware' => ['auth:sanctum', 'verified'], 'prefix' => 'user'], function () {

    Route::get('/dashboard', function () {
        return view('user-dashboard');
    })->name('user-dashboard');



    Route::get('/books/request-book', function () {
        return view('library.request-book');
    })->name('request.book');
});




