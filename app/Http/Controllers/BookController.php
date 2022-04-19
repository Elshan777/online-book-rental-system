<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookFormRequest;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


// use App\Http\Requests\BookRequests;

class BookController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Book::class, 'book');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $books = Book::all();
        $data['books'] = Book::orderBy('id')->paginate(8);
        return view('books.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['genres'] = Genre::orderBy('id')->get();
        return view('books.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'authors' => 'required',
            'isbn' => 'required',
            'image_url' => 'nullable',
            'pages' => 'required',
            'language_code' => 'nullable',
            'in_stock' => 'required',
            'description' => 'nullable',
            'released_at' => 'nullable'
        ]);
        $book = new Book;
        $book->title = $request->title;
        $book->authors = $request->authors;
        $book->isbn = $request->isbn;
        $book->image_url = $request->image_url;
        $book->pages = $request->pages;
        $book->language_code = $request->language_code;
        $book->description = $request->description;
        $book->in_stock = $request->in_stock;
        $book->released_at = $request->released_at;
        $book->save();

        $book->genres()->attach($request['genres'] ?? []);

        return redirect()->route('books.index')->with('success','Book has been added successfully.');
    }

    // public function store(BookFormRequest $request)
    // {
    //     $validated_data = $request->validated();
    //     $book = Book::create($validated_data);
    //     return redirect()->route('books.show', $book->id);
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
        $status = null;
        $user_id = Auth::id();
        $borrows = Borrow::where('reader_id', $user_id)->get();
        foreach ($borrows as $rent) {
            if ($rent['book_id'] == $book->id) {
                $status = $rent['status'];
            }
        }
        $genres = array();
        foreach ($book->genres()->get() as  $value) {
            # code...
            array_push($genres, $value['name']);
        }
        error_log($book->genres()->get());
        // $genres = 

        return view('books/detail', [
            'book' => $book,
            'status' => $status,
            'genres' => $genres
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
        // $this->authorize('edit', $book);
        $genres = Genre::orderBy('id')->get();
        return view('books/edit', [
            'book' => $book,
            'genres' => $genres
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update( Book $book, Request $request )
    {
        //
        // $validated_data = $request->validated();
        $validated_data = $request->validate([
            'title' => 'required',
            'authors' => 'required',
            'isbn' => 'required',
            'image_url' => 'nullable',
            'pages' => 'required',
            'language_code' => 'nullable',
            'in_stock' => 'required',
            'description' => 'nullable',
            'released_at' => 'nullable'
        ]);
        $book->update($validated_data);
        $book->genres()->attach($request['genres'] ?? []);
        return redirect()->route('books.show', $book->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
        $book->delete();
        return redirect()->route('books.index');
    }
}
