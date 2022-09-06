@extends('layouts.dashboard')

@section('content')

    <h1>{{ $post->title }}</h1>

    <h3 class="mt-4">Content:</h3>
    <p class="mb-4">{{ $post->content }}</p>
    
    <div>Created on: {{ $post->created_at->format('l, d F Y') }}</div>
    <div>Updated on: {{ $post->updated_at->format('l, d F Y') }}</div>
    <div>Slug: {{ $post->slug }}</div>

    <div class="mt-5">
        <a class="btn btn-primary" href="{{ route('admin.posts.edit', ['post' => $post->id]) }}">Edit post</a>

        <form class="d-inline" action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="post">
            @csrf
            @method('DELETE')
            <input class="btn btn-danger" type="submit" value="Delete post">
        </form>
    </div>

@endsection