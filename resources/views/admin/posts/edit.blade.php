@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Post... <span class="text-info">{{ $post->title }}</span></h1>
 
        <form action="{{ route('admin.posts.update', $post->id) }}" method='POST'>
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control 
                @error('title')
                    is-invalid
                @enderror"
                id="title" placeholder="Insert Post Title" name="title"
                value="{{ old('title', $post->title) }}">
                @error('title')
                    <small class="text-danger">{{ $message }}</small>   
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea type="text" class="form-control
                @error('title')
                    is-invalid
                @enderror"
                id="content" rows="6" name="content">
                    {{ old('content', $post->content) }}
                </textarea>
                @error('title')
                    <small class="text-danger">{{ $message }}</small>   
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
            <a href="{{ route('admin.posts.index') }}">Posts Index</a>
        </form>
    </div>
@endsection