
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register Page</title>

   <!-- custom css file link  -->
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

    <form method="POST" name="register" action="{{ route('registerpost') }}">
    {{ csrf_field() }}
      <h1>Register</h1>
      <label for="text">Name :</label>
      <input type="text" name="name"  placeholder="Enter your name"><br>
      <label for="email">Email :</label>
      <input type="email" name="email"  placeholder="Enter your email"><br>
      <label for="password">Password :</label>
      <input type="password" name="password"  placeholder="Enter your password"><br>
      <label for="text">User Type :</label>
      <select name="user_type">
         <option value="admin">Admin</option>
         <option value="user">User</option>
      </select><br>
      <input type="submit" name="submit" value="Submit" class="form-btn">
      <p>Already have an account? <a href="{{ url('login') }}">Login now</a></p>
   </form>

</div>

</body>
</html>
