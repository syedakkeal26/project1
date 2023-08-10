

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
         <div class="">
            @if(session()->has('error'))
                <div class ="alert alert-danger col-xs-12 col-sm-6 offset-sm-3 col-md-6 offset-md-9">{{session('error')}}</div>
            @endif

            @if(session()->has('success'))
                <div class ="alert alert-success">{{session('success')}}</div>
            @endif
        </div>
        <h1>Login</h1>

        <div class="form-group mb-2">
            <label>Email : </label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" autofocus="true" name="email" id="email"><br>
            @error('email')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group mb-2">
            <label>Password :</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" value="{{ old('password') }}"name="password" id="password"><br>
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
