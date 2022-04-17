<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookSearchController;
use App\Http\Controllers\BorrowController;


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
    return view('auth.login');
});

// Route::get('/books', function () {
//     return view('books.books');
// });

// Route::get('/books/create', function () {
//     return view('books.create');
// });

Route::resource('/books', BookController::class);

Route::get('/search', [BookSearchController::class, 'search'])->name('search');
Route::get('/create_request', [BorrowController::class, 'create_request'])->name('create_request');
Route::get('/approve', [BorrowController::class, 'approve'])->name('approve');
Route::get('/reject', [BorrowController::class, 'reject'])->name('reject');
Route::get('/return', [BorrowController::class, 'return'])->name('return');
Route::get('/rentals', [BorrowController::class, 'rentals'])->name('rentals');


Route::resource('/borrows', BorrowController::class);



Route::resource('/genres', GenreController::class)->middleware('auth');
// Route::resource('/borrows', BorrowController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\BookController::class, 'index'])->name('books');
// Route::get('/', [App\Http\Controllers\BookController::class, 'index'])->name('books');
