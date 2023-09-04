<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="">Home</a>
                <div>
                    <div>
                        <div>
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
                <div class="col-md-6 offset-md-3">
                    <div class="table-responsive">
                        <table class="table table-hover progress-table text-center">
                            @if(session('success'))
                            <div class="alert alert-success">
                            {{ session('success') }}
                            </div>
                            @endif
                            <tr>
                                <td>
                                    <h3>User Profile</h3>
                                    <h1 class="text-center">Details</h1>
                                    <div class="det" style="font-size: 150%">
                                        <div class="form-group">
                                            <label for="name" class="control-label">Name :</label>
                                                <strong>{{ auth()->user()->name }}</strong>
                                         </div>
                                    <div class="form-group mb-2">
                                        <label>Email : </label>
                                            <strong>{{ auth()->user()->email }}</strong>
                                    </div>

                                        <a href="{{ route('user.edit.profile',['userId' => auth()->id()]) }}" class="btn btn-success">Edit</a>
                                        <a href="{{ route('user.index') }}" class="btn btn-danger">Back</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

</body>
</html>
