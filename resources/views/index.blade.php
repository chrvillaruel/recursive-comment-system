<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>Comment System</title>

    </head>
    <body class="antialiased">
        <div id="app">
            <blog-application />
        </div>

        <script src="{{ mix('/js/app.js') }}"></script>

    </body>
</html>
