@extends('layouts.base')

@section('content')
      <h2>{{ $book->title }}</h2>
      <img src="{{ $book->image_url }}" class="img-thumbnail" width="400px" alt="book cover picture">
      <p>Written by: {{ $book->authors }}</p>
      <p>{{ $book->description }}</p>

      <p> <b>Pages:</b> {{ $book->pages }}</p>
      <p>Language: <b> {{ $book->language_code}}  </b> </p>

      <p>In stock: {{ $book->in_stock}}</p>
      <p>ISBN {{ $book->isbn }}</p>
      <p>Date of release: {{ $book->released_at }}</p>

      <h5><b> Genres:  </b></h5>
      @foreach ($genres as $genre)
          <p>{{ $genre}} </p>
      @endforeach


      @if (Auth::user() and Auth::user()->is_librarian())
        <a href="{{ route('books.edit', $book->id) }}"  class="btn btn-primary">Edit</a>

        <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
          @method('DELETE')
          @csrf
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      @endif
        @if ($status == 'Borrow this book' or $status == null)
        <form action="{{ route('create_request') }}" method="GET">
          <input type="hidden" name="book_id" required value="{{$book->id}}"/>
          <button type="submit" class="btn btn-primary" >Borrow this book</button>
        </form>
        @elseif ($status == 'PENDING' or $status == 'REJECTED' or $status == 'RETURNED')
          <button type="submit" class="btn btn-primary" disabled>{{$status}}</button>
        @elseif ($status = 'ACCEPTED')
          <form action="{{ route('return') }}" method="GET">
            <input type="hidden" name="book_id" required value="{{$book->id}}"/>
            <button type="submit" class="btn btn-primary">RETURN</button>
          </form>
        @endif
      
@endsection
