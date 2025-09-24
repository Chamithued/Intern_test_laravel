<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/login.css')
    <title>Title</title>
</head>
<body>
            <div>
            <h2>Login</h2>
            <form action="/login" method="POST">
                @csrf
                <input name="loginemail" type="text" placeholder="email"> <br><br>
                <input name="loginpassword" type="password" placeholder="passsword"> <br><br>
                <button>Login</button><br><br>
            </form>
            <a href="/register">Don't have account</a>
        </div>
</body>
</html>