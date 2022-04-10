<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreFormRequest;
use App\Models\Genre;
use Illuminate\Http\Request;

// use App\Http\Requests\BookRequests;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['genres'] = Genre::orderBy('id')->paginate(5);
        return view('genres.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['styles'] = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'];
        return view('genres.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
 

    public function store(GenreFormRequest $request)
    {
        $validated_data = $request->validated();
        $genre = Genre::create($validated_data);
        return redirect()->route('genres.show', $genre->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Genre $genre)
    {
        //
        return view('genres/detail', [
            'genre' => $genre
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Genre $genre)
    {
        //
        $styles = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'];

        return view('genres/edit', [
            'genre' => $genre,
            'styles' => $styles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update( Genre $genre, GenreFormRequest $request )
    {
        //
        $validated_data = $request->validated();
        $genre->update($validated_data);
        return redirect()->route('genres.show', $genre->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre)
    {
        //
        $genre->delete();
        return redirect()->route('genres.index');
    }
}
