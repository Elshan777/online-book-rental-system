@extends('layouts.base')

@section('content')
      <h2>Edit Genre</h2>
      <div class="center">

        <form 
        action="/genres/{{ $genre->id }}" method="POST" enctype="multipart/form-data">

            @method('put')
            @csrf
            <?php $nameField='name'; ?>
            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="" value="{{ old('name', $genre->name) }}">
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

                <select name="style" id="style" class="form-control @error('style') is-invalid @enderror" value="{{ old('style', $genre->style) }}" >
                    <option value="{{$genre->style}}">{{ $genre->style}}</option>
                    @foreach($styles as $style)
                            <option value="{{$style}}">{{ $style}}</option>
                    @endforeach
                
                </select>
                
            </div>


            <div class="form-group">
            <button type="submit" class="btn btn-primary">Update genre</button>
            </div>

        </form>
    </div>
@endsection

