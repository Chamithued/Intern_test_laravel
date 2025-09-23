<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
</head>
<body>
    <h1> All Posts </h1>
    <ul>
    @foreach ($posts as $post)
        <b>{{$post->title}}</b>
        <li>{{$post->content}}</li><br>
        <!--<p><a href = "/edit/{{ $post->id }}"> Edit</a></p>
        <form action="/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button>Delete</button>
        </form>-->
    @endforeach
    </ul>

    <a href="/posts/create"> Create New Post </a><br><br>
    <p><a href="/posts/personal"> My posts </a></p>
    
    <form action="/logout" method="POST">
        @csrf
        <button>Log Out</button>
    </form>
</body>
</html>