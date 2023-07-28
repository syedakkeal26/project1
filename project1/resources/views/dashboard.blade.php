<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
</head>
<body>
<div >
    <div >
    <table style="width: 200px;height: 200px">
        <header>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>UserType</th>
            <th>Edit</th>
            <th>Delete</th>
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
</div>
</body>
</html>
