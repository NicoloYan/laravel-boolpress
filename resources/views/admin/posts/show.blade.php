@extends('layouts.dashboard')

@section('content')

    <h1>{{ $post->title }}</h1>

    @if ($post->cover)
        <img class="w-50" src="{{asset('storage/' . $post->cover)}}" alt="{{$post->title}}">
    @endif

    <h3 class="mt-4">Content:</h3>
    <p class="mb-4">{{ $post->content }}</p>
    
    <div>Created on: {{ $post->created_at->format('l, d F Y') }}</div>
    <div>Updated on: {{ $post->updated_at->format('l, d F Y') }}</div>
    <div>Slug: {{ $post->slug }}</div>

    <div>Category: {{ $post->category ? $post->category->name : 'none'}}</div>

    <div>
        Tags: 
        @if ($post->tags->isNotEmpty()) {
            @foreach ($post->tags as $tag)
                {{ $tag->name }} {{ !$loop->last ? ',' : '' }}
            @endforeach
        }
        @else 
            none
        @endif
    </div>

    <div class="mt-5">
        <a class="btn btn-primary" href="{{ route('admin.posts.edit', ['post' => $post->id]) }}">Edit post</a>

        <form class="d-inline" action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="post">
            @csrf
            @method('DELETE')
            <input class="btn btn-danger" type="submit" value="Delete post">
        </form>
    </div>

@endsection