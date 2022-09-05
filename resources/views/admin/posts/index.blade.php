@extends('layouts.dashboard')

@section('content')
    <h1>Posts list</h1>

    <div class="row row-cols-3">
        
        @foreach ($posts as $post)
            <div class="col mt-3">
                <div class="card">
                    {{-- <img src="..." class="card-img-top" alt="..."> --}}
                    <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                    <a href="{{ route('admin.posts.show', ['post' => $post->id]) }}" class="btn btn-primary">See details</a>
                    </div>
                </div>
            </div>
        @endforeach
        
    </div>
@endsection