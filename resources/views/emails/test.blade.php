<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>
<body>
    <center>
        <h2 style="padding: 25px;background: #e2e2e2;border-bottom: 6px green solid;">
            <a  href="{{ url('/login') }}">Website Login</a>
        </h2>
    </center>

    <p> Hello,<span>{{ $name }}</span></p>
    <p>
        You Register Successfully
        <br>
        Your registered mail : <span>{{ $email }}</span>
        <br>
        Your password : <span>{{ $psw }}</span>
    </p>
    <strong>  Thank you</strong>
</body>
</html>
