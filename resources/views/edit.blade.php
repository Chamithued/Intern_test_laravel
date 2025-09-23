<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
</head>
<body>
        <form action="/posts/{{$post->id}}" method="POST">
        @csrf
        @method('PUT')
        <input name="title" value="{{ $post->title }}"><br><br>
        <textarea name="content" >{{ $post->content }}</textarea><br><br>
        <button>Update Post</button>
    </form>
</body>
</html>