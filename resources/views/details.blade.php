<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/admin') }}">Home</a>
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
                    <h1 class="text-center">Details</h1>
                    <div class="det" style="font-size: 150%">
                    <div class="form-group">
                        <label for="name" class="control-label">Name :</label>
                        <strong>{{ $user->name }}</strong>
                    </div>
                    <div class="form-group mb-2">
                        <label>Email : </label>
                        <strong>{{ $user->email }}</strong>
                    </div>
                    <div class="form-group mb-2">
                        <label>User Type : </label>
                        <strong>{{ $user->user_type }}</strong>
                    </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                        <a class="col-xs-12 col-sm-6 offset-sm-3 col-md-6 offset-md-5" style="text-center" href="{{ url('/admin') }}">Back
                        </a>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>


</body>
</html>
