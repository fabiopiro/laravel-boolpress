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
                @error('content')
                    is-invalid
                @enderror"
                id="content" rows="6" name="content">{{ old('content') }}</textarea>
                @error('content')
                    <small class="text-danger">{{ $message }}</small>   
                @enderror
            </div>

            {{-- Category --}}
            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control
                @error('category_id')
                    is-invalid
                @enderror"
                name="category_id" id="category_id">
                        <option value="">
                            -Seleziona una categoria-
                        </option>
                        {{-- !devo recuperare le categorie! --}}
                        {{-- !PostController - create() ! --}}
                        {{--  --}}
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}"
                            {{-- Old Ternario --}}
                            {{ ($category->id == old('category_id')) ? 'selected' : '' }}>
                            {{-- Old Ternario --}}
                            {{$category->name}}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            {{-- Category --}}

            {{-- Tag --}}
            <div class="form-group mb-5">
                <h5>Tags</h5>
                @foreach ($tags as $tag)
                    <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input"
                        name="tags[]"
                        id="tag-{{ $tag->id }}"
                        value="{{ $tag->id }}"
                        {{ in_array($tag->id, old('tags', [])) ? 'checked' : ''}}
                        >

                        <label class="form-check-label" for="tag-{{ $tag->id }}">
                            {{ $tag->name }}
                        </label>
                    </div>
                @endforeach
                @error('tags')
                    <div>
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    </div>
                @enderror
            </div>
            {{-- /Tag --}}


            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{ route('admin.posts.index') }}">Posts Index</a>
        </form>
    </div>
@endsection