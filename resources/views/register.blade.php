
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


    <div class="container">

    <form method="POST" name="register" action="{{ route('registerpost') }}">
    {{ csrf_field() }}
    <h1>Register</h1>
      <div class="form-group mb-2">
        <label>Name : </label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter your name" value="{{ old('name') }}" name="name" id="name"><br>
        @error('name')
              <span class="text-danger" role="alert">{{ $message }}</span>
          @enderror
      </div>
      <div class="form-group mb-2">
        <label>Email : </label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email" value="{{ old('email') }}" name="email" id="email"><br>
        @error('email')
              <span class="text-danger" role="alert">{{ $message }}</span>
          @enderror

    </div>
    <div class="form-group mb-2">
        <label>Password :</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter password"name="password" value="{{ old('password') }}"id="password"><br>
        @error('password')
              <span class="text-danger" role="alert">{{ $message }}</span>
          @enderror
    </div>
      {{-- <label for="text">User Type :</label>
      <select name="user_type">
         <option value="admin">Admin</option>
         <option value="user">User</option>
      </select><br> --}}
      <input type="hidden" name="Register" value="1" />
      <input type="submit" name="submit" value="Submit" class="form-btn">
      <br><br><strong>Already have an account? <a href="{{ url('login') }}">Login now</a></strong>
   </form></div>


</body>
</html>
