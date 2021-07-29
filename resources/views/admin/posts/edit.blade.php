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
                            {{ ($category->id == old('category_id', $post->category_id)) ? 'selected' : '' }}>
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
            {{-- @dump($post->tags) --}}
            <div class="form-group mb-5">
                <h5>Tags</h5>
                @foreach ($tags as $tag)
                    <div class="form-check form-check-inline">
                        @if ($errors->any())
                            <input type="checkbox" class="form-check-input"
                            name="tags[]"
                            id="tag-{{ $tag->id }}"
                            value="{{ $tag->id }}"
                            {{ in_array($tag->id, old('tags', [])) ? 'checked' : ''}}
                            >                        
                        @else
                            <input type="checkbox" class="form-check-input"
                            name="tags[]"
                            id="tag-{{ $tag->id }}"
                            value="{{ $tag->id }}"
                            {{ $post->tags->contains($tag->id) ? 'checked' : ''}}
                            >   
                        @endif

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
            <button type="submit" class="btn btn-primary">Edit</button>
            <a href="{{ route('admin.posts.index') }}">Posts Index</a>
        </form>
    </div>
@endsection