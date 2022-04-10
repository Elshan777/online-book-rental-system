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

Route::resource('/books', BookController::class);
Route::get('/search', [BookSearchController::class, 'search'])->name('search');


Route::resource('/genres', GenreController::class);


// // books
// Route::get('/books', [BookController::class, 'index'])->name('books.index');

// Route::get('/books/{id}/show', [BookController::class, 'show'] )->name('books.show');

// Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
// Route::post('books/create', [BookController::class, 'store'] )->name('books.store');

// Route::get('/books/{id}/edit', [BookController::class, 'edit'] )->name('books.edit');
// Route::put('/books/{id}', [BookController::class, 'update'] )->name('books.update');

// Route::get('/books/1/tracks/create', [BookController::class, 'create_tracks']);
