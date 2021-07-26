@extends('layouts.app')

@section('content')
    <div class="container">

        @if (session('deleted'))
            <div class="alert alert-success">
                {{ session('deleted') }} correctly deleted
            </div> 
        @endif

        <h1>POSTS</h1>
        {{-- Nuovo Post - CREATE --}}
        <a class="btn btn-primary mt-4 mb-4" href="{{ route('admin.posts.create') }}">New Post</a>
        {{-- Nuovo Post - CREATE --}}
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th colspan="3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->slug }}</td>
                        <td>
                            {{-- SHOW --}}
                            {{-- tag <a>! il metodo è GET! --}}
                            <a class="btn btn-success" href="{{ route('admin.posts.show', $item->id) }}">SHOW</a>
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{ route('admin.posts.edit', $item->id) }}">EDIT</a>
                        </td>
                        <td>
                            <form action="{{ route('admin.posts.destroy', $item->id) }}" 
                                onSubmit="return confirm('Sei sicuro di voler eliminare questo articolo?')"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">DELETE</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection