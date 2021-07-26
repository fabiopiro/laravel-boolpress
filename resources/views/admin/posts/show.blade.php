@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <a class="btn btn-warning" href="{{ route('admin.posts.index') }}">Posts Index</a>
        <a class="btn btn-primary" href="{{ route('admin.posts.edit', $post->id) }}">Modifica</a>
        <a href=""></a>
        <small>{{ $post->slug }}</small>
        <div class="mt-4">
            {{ $post->content }}
        </div>
    </div>
@endsection

{{-- Collego! --}}