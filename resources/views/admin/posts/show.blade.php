@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>
            {{ $post->title }}
            {{-- Category --}}
            {{-- gestiamo il nullable - if --}}
            @if ($post->category != null)
                <a href="{{ route('admin.categories.show', $post->category->id) }}" class="badge badge-info">
                    {{ $post->category->name }}
                </a>
            @else
            <span class="badge badge-secondary">
                No Category
            </span>
            @endif
            {{-- gestiamo il nullable --}}
            {{-- @dump($post->category()) --}}
            {{-- @dump($post->category) --}}
            {{-- Category --}}

        </h1>
        <a class="btn btn-warning" href="{{ route('admin.posts.index') }}">Posts Index</a>
        <a class="btn btn-primary" href="{{ route('admin.posts.edit', $post->id) }}">Modifica</a>
        <a href=""></a>
        <small>{{ $post->slug }}</small>

        {{-- tag --}}
        @if (count($post->tags) > 0)
            <div class="mt-3 h4">
                @foreach ($post->tags as $tag)
                    <span class="badge badge-pill badge-dark">
                        {{  $tag->name }}
                    </span>
                @endforeach
            </div>
        @else
            <h5>Nessun Tag!!!</h5>
        @endif
        {{-- tag --}}


        <div class="mt-4">
            {{ $post->content }}
        </div>
    </div>
@endsection

{{-- Collego! --}}