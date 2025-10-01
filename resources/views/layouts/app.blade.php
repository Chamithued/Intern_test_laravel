<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
    @vite('resources/css/app.css')
    @vite('resources/css/nav.css')

    @stack('styles')
</head>
<body>
    @include('layouts.navbar')

    <div class="content">
        @yield('content')
    </div>
</body>
</html>