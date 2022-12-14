@extends('layouts.dashboard')

@section('content')

    <h1>Edit post</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.posts.update', ['post' => $post->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}">
        </div>

        <div class="mb-3">
            <label for="category_id">Category</label>
            <select class="form-select" id="category_id" name="category_id">
                <option value="">None</option>

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"{{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach

            </select>
        </div>

        <div class="mb-3">
            <h5>Edit tags</h5>

            @foreach ($tags as $tag)
                @if ($errors->any())
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{ $tag->id }}" id="tag-{{ $tag->id }}" name="tags[]"{{in_array($tag->id, old('tags', [])) ? 'checked' : ''}}>
                        <label class="form-check-label" for="tag-{{ $tag->id }}">
                        {{$tag->name}}
                        </label>
                    </div>
                @else
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{ $tag->id }}" id="tag-{{ $tag->id }}" name="tags[]"{{$post->tags->contains($tag) ? 'checked' : ''}}>
                        <label class="form-check-label" for="tag-{{ $tag->id }}">
                        {{$tag->name}}
                        </label>
                    </div>
                @endif    
            @endforeach
        </div>


        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="6">{{ old('content', $post->content) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Post image</label>
            <input class="form-control" type="file" id="image" name="image">
            <h6 class="mt-3">Image preview</h6>
            <img class="w-50" src="{{asset('storage/' . $post->cover)}}" alt="">
        </div>

        <input type="submit" value="Edit">
    </form>

@endsection