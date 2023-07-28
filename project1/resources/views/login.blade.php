

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
</head>
<body>
    <div class="mt-5">
        @if($errors->any())
          <div class="col-12">
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
          </div>
        @endif

        @if(session()->has('error'))
            <div class ="alert alert-danger">{{session('error')}}</div>
        @endif

        @if(session()->has('success'))
            <div class ="alert alert-success">{{session('success')}}</div>
        @endif

    </div>
    <div class="container">
    <form method="POST" name="login" action="{{ route('loginpost') }}">
        {{ csrf_field() }}

        <h1>Login</h1>
        <label for="email">Email :</label>
        <input type="text" class="login-input" name="email" placeholder="Email" autofocus="true"/><br>
        <label for="password">Password :</label>
        <input type="password" class="login-input" name="password" placeholder="Password" /><br>
        <input type="hidden" name="login_form" value="1" />
        <input type="submit" value="Login" name="login" class="login-button"/>
        <p>To Create an account? <a href="{{ url('register') }}">Register</a></p>
    </form>
    </div>
</body>
</html>
