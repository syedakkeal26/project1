<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

</head>
<body>
    <div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/dashboard') }}">Home</a>
            <div>
                <div>
                    <div>
                        {{ auth()->user()->email}}
                        <a class="nav-link" href="{{ route('signout') }}">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <nav style="background-color: #e3f2fd;">
        <div class=" btn-group-sm">
            <span class="navbar-toggler-icon"></span>
        </div>
    </nav>
<div class="container">

  <div class="row">
    <div class="col-xs-12 col-sm-6 offset-sm-3 col-md-6 offset-md-3">

      <div class="my-3">

        @if (isset($user))

          <form action="{{ route('admin.update', $user->id) }}"  method="POST">
            {{-- {{route('dashboard',[$user->id])}}" --}}
            {{ csrf_field() }}

            {{ method_field('PUT') }}

            <h1 class="text-center">Edit</h1>
            <div class="form-group">
                <label for="name" class="control-label">Name :</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" placeholder="Enter your name" maxlength="100" >
                @error('name')
                <span class="text-danger" role="alert">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group mb-2">
            <label>Email : </label>
            <input type="email" class="form-control" placeholder="Enter your email" value="{{ $user->email }}" name="email" id="email">
            @error('email')
                  <span class="text-danger" role="alert">{{ $message }}</span>
              @enderror
        </div>
            <div class="form-group">
              <label for="user_type" class="control-label">User Type :</label>
              <select class="form-control" id="user_type" name="user_type" required>
                @foreach (['admin', 'user'] as $usertype)
                  @if ($usertype === $user->user_type)
                    <option value="{{ $usertype }}" selected>{{ $usertype }}</option>
                  @else
                    <option value="{{ $usertype }}">{{ $usertype }}</option>
                  @endif
                @endforeach
              </select>
              <br>
            </div>

            <div class="form-group">
                <div class="col-md-6">
                   <input type="submit" name="update" value='Update' class='btn btn-success col-xs-12 col-sm-6 offset-sm-3 col-md-6 offset-md-9'>
                </div><br>
                <a class="col-xs-12 col-sm-6 offset-sm-3 col-md-6 offset-md-5" style="text-center" href="{{ url('/admin') }}">Back
                </a>
            </div>

          </form>

        @else
        <p class="text-center">User Cannot Access</p>
        @endif

      </div>

    </div>
  </div>
</div>

