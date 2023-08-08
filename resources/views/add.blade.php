<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >

</head>
<body>

<div class="container">

  <div class="row">
    <div class="col-xs-12 col-sm-6 offset-sm-3 col-md-6 offset-md-3">

      <div class="my-3">


        <form method="POST" action="{{ route('adduserpost') }}">
            {{ csrf_field() }}

            <h1 class="text-center">Add User</h1>
            <div class="form-group">
              <label for="name" class="control-label">Name :</label>
              <input type="text" name="name" id="name" class="form-control"  placeholder="Enter your name" maxlength="100" >
              @error('name')
              <span class="text-danger" role="alert">{{ $message }}</span>
          @enderror
        </div>
            <div class="form-group">
              <label for="email" class="control-label">Email :</label>
              <input type="text" name="email" id="email"  class="form-control"placeholder="Enter your email" >
              @error('email')
              <span class="text-danger" role="alert">{{ $message }}</span>
          @enderror
            </div>
            <div class="form-group">
                <label for="user_type" class="control-label">User Type :</label>
                <select class="form-control" id="user_type" name="user_type" >
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                @error('user_type')
          <span class="text-danger" role="alert">{{ $message }}</span>
      @enderror
                <br>
              </div>

            <div class="form-group">
                <div class="col-md-6">
                   <input type="submit" name="Add" value='Add User' class='btn btn-success col-xs-12 col-sm-6 offset-sm-3 col-md-6 offset-md-9'>
                </div><br>
                <a class="col-xs-12 col-sm-6 offset-sm-3 col-md-6 offset-md-5" style="text-center" href="{{ url('/dashboard') }}">Back
                </a>
            </div>

        </form>
      </div>

    </div>
  </div>
</div>
</body>
</html>
