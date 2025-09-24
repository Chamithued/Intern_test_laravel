<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/show.css')
    <title>Posts</title>
</head>
<body>
    <h1> All Posts </h1>
    <ul>
    @foreach ($posts as $post)
        <li><b>{{$post->title}}</b>
        {{$post->content}}</li><br>
        <!--<p><a href = "/edit/{{ $post->id }}"> Edit</a></p>
        <form action="/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button>Delete</button>
        </form>-->
    @endforeach
    </ul>

    <a href="/posts/create"> Create New Post </a>
    <a href="/posts/personal"> My posts </a><br><br>
    
    <form action="/logout" method="POST">
        @csrf
        <button>Log Out</button>
    </form>
</body>
</html>