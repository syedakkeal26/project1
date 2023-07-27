<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>First Project</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />



    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div >
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
