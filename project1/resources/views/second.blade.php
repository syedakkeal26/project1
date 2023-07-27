<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>First laravel project</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
</head>
<body>
    <div class="container">
    <form method="head" name="login" action="">
        <label for="email">Email :</label>
        <input type="text" class="login-input" name="email" placeholder="Email" autofocus="true"/><br>
        <label for="password">Password :</label>
        <input type="password" class="login-input" name="password" placeholder="Password" /><br>
        <input type="hidden" name="login_form" value="1" />
        <input type="submit" value="Login" name="login" class="login-button"/>
    </form>
    </div>
</body>
</html>
