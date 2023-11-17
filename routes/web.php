<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/home', function () {
    return view('home');
})->name('home');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/book_table', function () {
    return view('book_table');
})->name('book_table');

Route::get('/contactus', function () {
    return view('contactus');
})->name('contactus');

Route::get('/events', function () {
    return view('events');
})->name('events');

Route::get('/menu', function () {
    return view('menu');
})->name('menu');

Route::get('/sign_in', function () {
    return view('sign_in');
})->name('sign_in');

Route::get('/signup', function () {
    return view('signup');
})->name('signup');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
