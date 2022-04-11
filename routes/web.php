<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookSearchController;

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
    return view('welcome');
});

// Route::get('/books', function () {
//     return view('books.books');
// });

// Route::get('/books/create', function () {
//     return view('books.create');
// });

Route::resource('/books', BookController::class)->middleware('auth');
Route::get('/search', [BookSearchController::class, 'search'])->name('search');


Route::resource('/genres', GenreController::class)->middleware('auth');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
