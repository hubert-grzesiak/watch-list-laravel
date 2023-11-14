<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Watch List') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
    @laravelViewsStyles(laravel-views)
</head>
<body class="font-sans antialiased">
<x-banner />

<div class="bg-gray-100 flex flex-col justify-between h-[100vh]">
    @livewire('navigation-menu')

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <!-- Page Content -->
    <main class="flex justify-center items-center">
        {{ $slot }}
    </main>
    <footer class="flex w-full justify-center">
        <ul class="flex w-full gap-4 py-5 bg-secondary text-primary justify-center">
            <li><a href="movies">Movies</a></li>
            <li><a href="series">Series</a></li>
            <li><a href="podcasts">Podcasts</a></li>
        </ul>
    </footer>
</div>

@stack('modals')

@livewireScripts
@laravelViewsScripts(laravel-views)
</body>
</html>
