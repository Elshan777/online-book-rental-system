@extends('layouts.base')

@section('content')
      <h2>{{ $genre->name }}</h2>
      <p>Style: <b> {{ $genre->style}}  </b> </p>

      <a href="{{ route('genres.edit', $genre->id) }}"  class="btn btn-primary">Edit</a>
      <form action="{{ route('genres.destroy', $genre->id) }}" method="POST" class="d-inline">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger">Delete</button>
      </form>
@endsection
