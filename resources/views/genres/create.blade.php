@extends('layouts.base')

@section('content')
      <h2>Add New Genre</h2>
      <div class="center">
        <form 
        action="{{ route('genres.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="" value="{{ old('name', '') }}">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            </div>

            <div class="form-group">
                <label for="style">Style</label>
                @error('authors')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
                @enderror

                <select name="style" id="style" class="form-control @error('style') is-invalid @enderror" value="{{ old('style', '') }}" >

                    @foreach($styles as $style)
                            <option value="{{$style}}">{{ $style}}</option>
                    @endforeach
                
                </select>
                
            </div>


            <div class="form-group">
            <button type="submit" class="btn btn-primary">Add new genre</button>
            </div>

        </form>
    </div>
@endsection

