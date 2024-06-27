<!DOCTYPE html>
<html lang="en">
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @vite(['resources/css/app.css'])
        <title>{{ $title ?? 'Applications' }}</title>
    </head>
    <body>
        <nav>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/applications">View All</a></li>
            </ul>
        </nav>
        <main>
            {{ $slot }}
        </main>
    </body>
</html>