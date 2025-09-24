<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/personal.css')
    <title>Posts</title>
</head>
<body>
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
</body>
</html>