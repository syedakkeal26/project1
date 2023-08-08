

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


    <div class="container">
    <form method="POST" name="login" action="{{ route('loginpost') }}">
        {{ csrf_field() }}


            @if(session()->has('error'))
                <div class ="alert alert-danger">{{session('error')}}</div>
            @endif

            @if(session()->has('success'))
                <div class ="alert alert-success">{{session('success')}}</div>
            @endif
        <h1>Login</h1>
        <div class="form-group mb-2">
            <label>Email : </label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" autofocus="true" name="email" id="email"><br>
            @error('email')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group mb-2">
            <label>Password :</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" id="password"><br>
            @error('password')
                <span class="invalid-feedback" >{{ $message }}
                </span>
            @enderror
        </div>
        <input type="hidden" name="login_form" value="1" />
        <input type="submit" value="Login" name="login" class="login-button"/><br>
        <br><br><strong>To Create an account? <a href="{{ url('register') }}">Register</a></strong>
    </form>
    </div>
</body>
</html>
