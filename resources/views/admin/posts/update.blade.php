@extends('layouts.app')


@section('content')

<div class="container">

    @if ($errors->any())

    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $elem)
            <li>{{$elem}}</li>
            @endforeach
        </ul>
    </div>

    @endif

    <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <h2 class="fs-4 text-secondary my-4">Modifica i campi del tuo post, poi invia il tutto!</h2>
        <div class="mb-3">
            <label for="post-title" class="form-label">Title</label>
            <input type="text" class="form-control" id="post-title" name="title" placeholder="Titolo" value="{{ old('title') ?? $post->title }}">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="post-content" class="form-label">Content</label>
            <textarea class="form-control" name="content" id="post-content" rows="3">{{ old('title') ?? $post->content }}</textarea>
        </div>
        <div class="mb-3">
            <label for="post-cover-image" class="form-label">image</label>
            <input type="file" class="form-control" name="cover-image" id="post-cover-image" rows="3">{{ old('title') ?? $post->content }}</input>
        </div>
        <div class="mb-3">
            <label for="post-categories" class="form-label">Categories</label>
            <select class="form-select form-select-lg @error ('category_id') is-invalid @enderror" name="category_id" id="post-categories">


                <option value="">Scegli una categoria</option>

                @foreach ( $categories as $elem )

                <option value="{{ $elem->id }}" {{ old( 'category_id', $post->category_id ) == $elem->id ? 'selected' : '' }}>{{ $elem->name }}</option>

                @endforeach
            </select>
            <div>
                @error('category_id')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="mb-3 form-group">

            @foreach ($technologies as $elem)
            <div class="form-check">

                @if( $errors->any() )

                <input class="form-check-input" name="technologies[]" type="checkbox" value="{{ $elem->id }}" id="technology-checkbox-{{ $elem->id }}" {{ in_array( $elem->id, old('technologies', []) ) ? 'checked' : '' }}>
                @else

                <input class="form-check-input" name="technologies[]" type="checkbox" value="{{ $elem->id }}" id="technology-checkbox-{{ $elem->id }}" {{ ($post->technologies->contains($elem)) ? 'checked' : '' }}>

                @endif

                <label class="form-check-label" for="technology-checkbox-{{ $elem->id }}">
                    {{ $elem->name }}
                </label>
            </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">invia</button>
    </form>
</div>


@endsection