@extends('layouts.dashboard')

@section('content')
    <h1>
        Create a new post
    </h1>

    <form action="{{ route('admin.posts.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Title goes here">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="6"></textarea>
        </div>

        <input type="submit" value="Save post">
    </form>

@endsection