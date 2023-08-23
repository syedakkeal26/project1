<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script src="https://kit.fontawesome.com/c3821bec25.js" crossorigin="anonymous"></script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="">Home</a>
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
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
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
                <div class="del" style="display: -webkit-inline-flex">
                 {{-- <a href="{{ route('admin.show',$user->id) }}" >
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg></i>
                 </i></a> --}}
                 <form action="{{ route('admin.show',$user->id) }}" method="GET">
                    @csrf
                    <button class="btn-group btn-group-sm float-right btn btn-sm btn-info " type="submit"><i class="fas fa-eye"></i></button>
                 </form>
                <form action="{{ route('admin.edit', $user->id)}}" method="GET">
                  @csrf
                  <button class="btn-group btn-group-sm float-right btn btn-sm btn-success " type="submit"><i class="fa fa-pencil"></i></button>
                </form>
                <form action="{{ route('admin.destroy', $user->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn-group btn-group-sm float-right btn btn-sm btn-danger " type="submit" onclick="return confirm('Are you sure you Want to delete?')"><i class="fa fa-trash"></i></button>
                </form>
                </div>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    {!! $users->withQueryString()->links('pagination::bootstrap-5') !!}
</div>
</body>
</html>
