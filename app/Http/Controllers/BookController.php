<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookFormRequest;
use App\Models\Book;
use Illuminate\Http\Request;

// use App\Http\Requests\BookRequests;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $books = Book::all();
        $data['books'] = Book::orderBy('id')->paginate(5);
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
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    //     // $validated_data = $request->validated();
    //     // $book = Book::create($validated_data);
    //     $request->validate([
    //         'title' => 'required',
    //         'authors' => 'required',
    //         'isbn' => 'required',
    //         'image_url' => 'nullable',
    //         'pages' => 'required',
    //         'language_code' => 'nullable',
    //         'in_stock' => 'required',
    //         'description' => 'nullable',
    //         'released_at' => 'nullable'
    //     ]);
    //     $book = new Book;
    //     $book->title = $request->title;
    //     $book->authors = $request->authors;
    //     $book->isbn = $request->isbn;
    //     $book->image_url = $request->image_url;
    //     $book->pages = $request->pages;
    //     $book->language_code = $request->language_code;
    //     $book->description = $request->description;
    //     $book->in_stock = $request->in_stock;
    //     $book->released_at = $request->released_at;
    //     $book->save();

    //     return redirect()->route('books.index')->with('success','Book has been added successfully.');
    // }

    public function store(BookFormRequest $request)
    {
        $validated_data = $request->validated();
        $book = Book::create($validated_data);
        return redirect()->route('books.show', $book->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
        return view('books/detail', [
            'book' => $book
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
        return view('books/edit', [
            'book' => $book
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update( Book $book, BookFormRequest $request )
    {
        //
        $validated_data = $request->validated();
        $book->update($validated_data);
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
