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
                <a class="navbar-brand" href="{{ url('/login') }}">Home</a>
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
                {{-- <a class="btn btn-success" href="{{ url('/sendemail') }}">Send Email</a> --}}
            </div>
        </nav>

<div class="table-responsive">
    <table class="table table-hover progress-table text-center" >
            <div class="col-lg-12 margin-tb">
                <div class='table table-hover progress-table text-center '>
                    <h3> List Of Users</h3>
                </div>
                <div class="col-lg-2 pull-right ">
                    <a class="btn btn-success " href={{ route('admin.create') }}> Add New</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
        <header>
            <th>#</th>
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
                <td>
                <form action="{{ route('admin.edit', $user->id)}}" method="GET">
                  @csrf
                  <button class="btn-group btn-group-sm float-right btn btn-sm btn-success " type="submit"><i class="fa fa-pencil"></i></button>
                </form>
                <form action="{{ route('admin.destroy', $user->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn-group btn-group-sm float-right btn btn-sm btn-danger " type="submit"><i class="fa fa-trash"></i></button>
                </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    {!! $users->withQueryString()->links('pagination::bootstrap-5') !!}
</div>
</body>
</html>
