@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>New Post...</h1>
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
        <form action="{{ route('admin.posts.store') }}" method='POST'>
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control 
                @error('title')
                    is-invalid
                @enderror"
                id="title" placeholder="Insert Post Title" name="title"
                value="{{ old('title') }}">
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
                    {{ old('content') }}
                </textarea>
                @error('title')
                    <small class="text-danger">{{ $message }}</small>   
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{ route('admin.posts.index') }}">Posts Index</a>
        </form>
    </div>
@endsection