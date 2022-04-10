@extends('layouts.base')

@section('content')

<form action="{{ route('search') }}" method="GET">
    <input type="text" name="search" required/>
    <button type="submit">Search</button>
</form>

    <div class="row">


        @if($books->isNotEmpty())
            @foreach ($books as $book)
            <div class="col-sm-3 my-3">
                    <div class="card h-100">
                        <img src="{{ $book->image_url }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title}}</h5>
                            <p class="card-text">{{$book->description}}</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-primary">Open</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else 
            <div>
                <h2>No books found</h2>
            </div>
        @endif

    </div>
@endsection
{{-- 

@if($books->isNotEmpty())
    @foreach ($books as $book)
        <div class="book-list">
            <p>{{ $book->title }}</p>
        </div>
    @endforeach
@else 
    <div>
        <h2>No books found</h2>
    </div>
@endif --}}