<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ env('APP_NAME', 'Laravel') }}</title>

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <header-component></header-component>
        <main>
            @yield('content')
        </main>
    </div>
    @yield('scripts')
    <script>
        window.scroll({
            top: 2500, 
            left: 0, 
            behavior: 'smooth'
        });

        // Scroll certain amounts from current position 
        window.scrollBy({ 
            top: 100, // could be negative value
            left: 0, 
            behavior: 'smooth' 
        });
    </script>
</body>
</html>
