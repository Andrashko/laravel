<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @yield('resources')
</head>
<body>
<header>
    @yield('header')
</header>
<main>
    @yield('content')
</main>
<footer>
    @yield('footer')
</footer>
</body>
</html>