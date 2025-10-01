<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/create.css')
    <title>Posts</title>
</head>
<body>
        @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/posts" method="POST">
        @csrf
        
        <input name="title" placeholder="Title"><br><br>
        <textarea name="content" placeholder="Content"></textarea><br><br>
        <button>Add Post</button>

    </form>
</body>
</html>