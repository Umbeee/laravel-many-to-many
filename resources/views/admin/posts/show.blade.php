@extends('layouts.app')


@section('content')


<div class="container">

    <h2 class="fs-4 text-secondary my-4">{{ $post->title }}</h2>

    <p>{{ $post->content }}</p>

    <img src="{{ asset( 'storage/' . $post->cover_image ) }}" alt="404 img" class="img-fluid">


    <div class="my-3">

        @if($post->category)
        Categoria: <b>{{ $post->category->name }}</b>
        @endif

    </div>

    <div class="my-3">
        Linguaggio usati per il progetto:


        @foreach( $post->technologies as $elem )


        <b>{{ $elem->name }}</b>


        @endforeach


    </div>



</div>

@endsection