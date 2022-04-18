<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Borrow;
use App\Models\Book;
use App\Models\User;
use App\Models\Genre;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function main()
    {
        
        $books = Book::orderBy('id')->get();
        $users = User::orderBy('id')->get();
        $borrows = Borrow::orderBy('id')->get();
        

        $data['book_count'] = count($books);
        $data['user_count'] = count($users);
        $data['borrow_count'] = count($borrows);
        $data['borrow_count_active'] = count( Borrow::orderBy('id')->where('status', 'ACCEPTED')->get() );
        $data['genre_count'] = count( Genre::orderBy('id')->get() );

        return view('welcome', $data);

    }

}
