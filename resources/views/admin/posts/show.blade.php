@extends('layouts.dashboard')

@section('content')

    <h1>{{ $post->title }}</h1>

    <h3 class="mt-4">Content:</h3>
    <p class="mb-4">{{ $post->content }}</p>
    
    <div>Created on: {{ $post->created_at }}</div>
    <div>Updated on: {{ $post->updated_at }}</div>
    <div>Slug: {{ $post->slug }}</div>

    <a class="btn btn-primary mt-5" href="{{ route('admin.posts.edit', ['post' => $post->id]) }}">Edit post</a>

@endsection