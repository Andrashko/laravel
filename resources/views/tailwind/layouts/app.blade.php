<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @yield('resources')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="flex flex-col min-h-screen">
    <header>
        @yield('header')
    </header>
    <main class="flex-grow">
        <div class="w-full max-w-2xl mx-auto">
            @yield('content')
        </div>
    </main>
    <footer>
        @yield('footer')
    </footer>
</div>
</body>
</html>