@extends('layouts.app')

@push('styles')
    @vite('resources/css/personal.css')
@endpush

@section('content')
@if(session('error'))
    <div style="color: red; margin-bottom: 10px;">
        {{ session('error') }}
    </div>
@endif

    <ul>
    @foreach ($posts as $post)
        <b>{{$post->title}}</b>
        <li>{{$post->content}}</li><br>
        <a href = "/edit/{{ $post->id }}"> Edit</a>
        <form action="/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button>Delete</button>
        </form>
    @endforeach
    </ul>

@endsection