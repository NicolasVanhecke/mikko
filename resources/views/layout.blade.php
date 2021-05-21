<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="/util.css"> <!-- Credits for CSS: https://colorlib.com/ -->
    	<link rel="stylesheet" href="/main.css"> <!-- Credits for CSS: https://colorlib.com/ -->
    	<link rel="stylesheet" href="/app.css"> <!-- Custom CSS -->

        <title>@yield('pagetitle')</title>
    </head>

    <body>
        @yield( 'content' )

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
