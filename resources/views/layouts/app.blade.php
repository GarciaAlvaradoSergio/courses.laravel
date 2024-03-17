<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    @guest
        @include('layouts._partials.navbar')
    @endguest

    @auth
        @include('layouts._partials.slidebar')
    @endauth

    <!-- Page Content -->
    @guest
        <main class="py-4">
            {{ $slot }}
        </main>
    @endguest

</body>

</html>
