<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav style="background-color: #e3f2fd;">
         <div class="container1">
            <a class="nav-link" href="{{ route('signout') }}">Logout</a>
            <span class="navbar-toggler-icon"></span>
        </div>
        </nav>
<div>
    <table class="table table-bordered data-table">
        <header>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>UserType</th>
            <th>Action</th>
        </header>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->user_type }}</td>
                <td></td>
                <td></td>
            </tr>

            @endforeach
        </tbody>
    </table>
    {!! $users->withQueryString()->links('pagination::bootstrap-5') !!}
</div>
</body>
</html>
