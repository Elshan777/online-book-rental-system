@extends('layouts.base')

@section('content')
<div class="row">
    @foreach ($genres as $genre)
        <div class="col-sm-3 my-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $genre->name}}</h5>
                        <p class="card-text">{{$genre->style}}</p>
                        {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                        <a href="{{ route('genres.show', $genre->id) }}" class="btn btn-primary">Open</a>
                    </div>
                </div>
            </div>
    @endforeach

</div>
  @endsection
