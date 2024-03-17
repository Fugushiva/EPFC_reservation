<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> {{config('app.name', 'Laravel') }}  - @yield('title')</title>
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
