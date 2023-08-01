<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/login') }}">Home
                </a>

                <div>
                    <div>
                    <ul>
                        <a class="nav-link" href="{{ route('signout') }}">Logout</a>
                       </ul>
                        <div>
                        @auth
                        {{ auth()->user()->name }}
                        @endauth
                        </div>

                    </div>
                </div>
            </div>
        </nav>

    <nav style="background-color: #e3f2fd;">
         <div class="btn-group btn-group-sm float-right">

            <span class="navbar-toggler-icon"></span>
        </div>
        </nav>

<div>
    <table class="table table-hover progress-table text-center">
        <header  >
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>UserType</th>
            <th>Action</th>
        </header>
        <tbody>
            @foreach ($users as $user)
            <tr >
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->user_type }}</td>
                <td><div class="btn-group btn-group-sm float-right" role="group" aria-label="Basic example">
                    <a href='/dashboard/{{ $user->id }}'
                       class="btn btn-secondary"><i class="fa fa-pencil"></i></a>
                  </div>
                  <div class="btn-group btn-group-sm float-right" role="group" aria-label="Basic example">
                    <a href='/dashboard/{{ $user->id }}'
                       class="btn btn-secondary"><i class="fa fa-trash"></i></a>
                  </div></td>

            </tr>
            @endforeach

        </tbody>
    </table>
    {!! $users->withQueryString()->links('pagination::bootstrap-5') !!}
</div>
</body>
</html>
