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
        <div class="table-responsive">
            <table class="table table-hover progress-table text-center" >
                <td>
                    <h1>Hello,</h1>
                    <h4>User Profile</h4>
                    <p>Name: {{ Auth::guard('admin')->user()->name }}</p>
                    <p>Email: {{ Auth::guard('admin')->user()->email }}</p>
                <!-- Inside your dashboard.blade.php -->
                <a href="{{ route('user.profile') }}" class="btn btn-primary">Edit My Profile</a>

                    <a href="{{ route('aboutus') }}" class="btn btn-success">Dashboard</a>

                </td>
            </table>
        </div>
</body>
</html>
