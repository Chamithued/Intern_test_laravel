@extends('layouts.app') 

@push('styles')
    @vite('resources/css/show.css')
@endpush

@section('content')
    <h1>All Posts</h1>

    <ul>
        @foreach ($posts as $post)
            <li>
                <b>{{ $post->title }}</b> - {{ $post->content }}
            </li>
            <br>
            <!-- Example edit/delete -->
            <!--
            <p><a href="/edit/{{ $post->id }}">Edit</a></p>
            <form action="/posts/{{ $post->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button>Delete</button>
            </form>
            -->
        @endforeach
    </ul>

    <a href="/posts/create">Create New Post</a>
    <a href="/posts/personal">My Posts</a><br><br>

    <form action="/logout" method="POST">
        @csrf
        <button>Log Out</button>
    </form>
@endsection