<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>First Project</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />



    </head>
    <body class="antialiased">
        <div>
        <div class="container">
            <h1>To do list</h1>
            <form method="POST" action="{{ route('saveItem') }}" accept-charset="UTF-8" >
            {{ csrf_field() }}
            <label for="listitem"> <h4>New Todo Item</h4></label><br>
            <input type="text" name="listItem"><br>
            <button type="submit" >Submit</button>
            </form>
             </div>
        </div>
    </body>
</html>
