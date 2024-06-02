<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>login Admin</h1>
    <form method="post" action="{{ url('/login-admin') }}">
        @csrf
        @if ($errors->has('login_gagal'))
            <div class="alert alert-danger">
                {{ $errors->first('login_gagal') }}
            </div>
        @endif

        <input type="email" name="email" required autofocus placeholder="email">
        <input type="password" name="password" required placeholder="password">

        <button type="submit">Login</button>
    </form>

</body>

</html>
