<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" /></head>
<body>

<div class="container">

  <div class="row">
    <div class="col-xs-12 col-sm-6 offset-sm-3 col-md-6 offset-md-3">

      <div class="my-3">

        @if (isset($user))

          <form action="/dashboard/{{ $user->id }}" method="POST">
            {{ csrf_field() }}

            {{ method_field('PUT') }}
            <h1 class="text-center">Edit{{ $user->id }}</h1>
            <div class="form-group">
              <label for="name" class="control-label">Name :</label>
              <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" maxlength="100" required>
            </div>
            <div class="form-group">
              <label for="email" class="control-label">Email :</label>
              <input type="text" name="email" id="email" value="{{ $user->email }}" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="user_type" class="control-label">User Type :</label>
              <select class="form-control" id="user_type" name="user_typte" required>
                @foreach (['admin', 'user'] as $usertype)
                  @if ($usertype === $user->user_type)
                    <option value="{{ $usertype }}" selected>{{ $usertype }}</option>
                  @else
                    <option value="{{ $usertype }}">{{ $usertype }}</option>
                  @endif
                @endforeach
              </select>
            </div>

            <div class="float-right">
              <button type="submit" class="float-right">Update</button>
            </div>
          </form>
        <a class="navbar-brand" href="{{ url('/dashboard') }}">Back
        @else
        <p class="text-center">User Cannot Access</p>
        @endif

      </div>

    </div>
  </div>
</div>

