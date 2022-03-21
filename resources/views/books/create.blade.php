@extends('layouts.base')

@section('content')
      <h2>New track</h2>
      <div class="center">
        <form 
        {{-- action="{{ route('projects.tracks.store', $project->id )}}" --}}
            method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="" value="{{ old('title', '') }}">
                {{-- @error('title') --}}
                <div class="invalid-feedback">
                    {{-- {{ $message }} --}}
                </div>
            {{-- @enderror --}}
            </div>

            <div class="form-group">
                <label for="name">Authors</label>
                <input name="authors" type="text" class="form-control @error('authors') is-invalid @enderror" id="authors" placeholder="" value="{{ old('authors', '') }}">
                {{-- @error('authors') --}}
                <div class="invalid-feedback">
                {{-- {{ $message }} --}}
                </div>
                {{-- @enderror --}}
            </div>

            <div class="form-group">
                <label for="name">Desrciption</label>
                {{-- <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="" value="{{ old('name', '') }}"> --}}
                <textarea name="description"  class="form-control" placeholder="Enter Description"></textarea>
                {{-- @error('name') --}}
                <div class="invalid-feedback">
                {{-- {{ $message }} --}}
                </div>
                {{-- @enderror --}}
            </div>

            <div class="form-group">
                <label for="released_at">Released At</label>
                <input name="released_at" type="date" class="form-control @error('released_at') is-invalid @enderror" id="released_at" placeholder="" value="{{ old('released_at', '') }}">
                {{-- @error('released_at') --}}
                <div class="invalid-feedback">
                {{-- {{ $message }} --}}
                </div>
                {{-- @enderror --}}
            </div>

            <div class="form-group">
                <label for="cover_image">Cover image URL</label>
                <input name="cover_image " type="text" class="form-control @error('cover_image ') is-invalid @enderror" id="cover_image " placeholder="" value="{{ old('cover_image ', '') }}">
            
                @error('cover_image ')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="pages">Pages</label>
                <input name="pages" type="number" class="form-control @error('pages') is-invalid @enderror" id="pages" placeholder="" value="{{ old('pages', '') }}">
                {{-- @error('pages') --}}
                <div class="invalid-feedback">
                {{-- {{ $message }} --}}
                </div>
                {{-- @enderror --}}
            </div>

            <div class="form-group">
                <label for="language_code">Language Code</label>
                <input name="language_code" type="text" class="form-control @error('language_code') is-invalid @enderror" id="language_code" placeholder="hu" value="{{ old('language_code', '') }}">
                {{-- @error('language_code') --}}
                <div class="invalid-feedback">
                {{-- {{ $message }} --}}
                </div>
                {{-- @enderror --}}
            </div>

            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input name="isbn" type="text" class="form-control @error('isbn') is-invalid @enderror" id="isbn" placeholder="" value="{{ old('isbn', '') }}">
                {{-- @error('isbn') --}}
                <div class="invalid-feedback">
                {{-- {{ $message }} --}}
                </div>
                {{-- @enderror --}}
            </div>

            <div class="form-group">
                <label for="in_stock">In Stock</label>
                <input name="in_stock" type="number" class="form-control @error('in_stock') is-invalid @enderror" id="in_stock" placeholder="" value="{{ old('in_stock', '') }}">
                {{-- @error('in_stock') --}}
                <div class="invalid-feedback">
                {{-- {{ $message }} --}}
                </div>
                {{-- @enderror --}}
            </div>


            <div class="form-group">
            <button type="submit" class="btn btn-primary">Add new book</button>
            </div>

        </form>
    </div>
@endsection

