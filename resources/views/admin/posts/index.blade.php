@extends('layouts.app')

@section('content')
<div class="container">
    <div class=" d-flex justify-content-between align-items-center">
        <h2 class="fs-4 text-secondary my-4">{{ __('Posts') }}</h2>
            <a href="{{route('admin.posts.create')}}">Crea un nuovo Post!</a>
    </div>
    
    <div class="row justify-content-center">
        <div class="col">

            @foreach($posts as $elem)
            <div class="card my-3">
                <div class="card-header">
                    {{ $elem->id }} - {{ $elem->title }}
                    <a href="{{route('admin.posts.show', $elem)}}">Mostra singolo post</a>
                </div>

                <div class="card-body">
                     
                    {{ $elem->content }}
                    <div>
                        <form action=" {{ route('admin.posts.destroy', $elem) }} " method="POST" class="">
            
                            @csrf
                            @method('DELETE')
        
                            <button class="btn btn-danger mt-3" onclick="return confirm('vuoi davvero eliminare il post?')">Delete</a>
                        </form>
                    </div>
                    <div>
                        <a href="{{ route('admin.posts.edit', $elem  )}}"  class="btn btn-dark mt-2">Edit</a>
                    </div>
                </div>

               
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection