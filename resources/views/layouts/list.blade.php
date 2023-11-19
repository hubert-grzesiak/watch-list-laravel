<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Watch Lists') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @livewireStyles
    @laravelViewsStyles('laravel-views')

    <!-- Scripts -->
    @wireUiScripts
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="font-sans antialiased">
<x-banner />
<x-wireui-notifications />
<x-wireui-dialog />

<div class="">
    @livewire('navigation-menu')

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white/70 max-h-[73px] h-full w-full bg-gray-300 rounded-md bg-clip-padding backdrop-filter backdrop-blur-md bg-opacity-30 border border-gray-100 shadow w-full">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif
    <!-- Page Content -->
    <main class="">
        {{ $slot }}
    </main>
    <footer class="flex w-full justify-center shadow">
        <ul class="flex w-full gap-4 py-5 h-full w-full bg-white bg-clip-padding backdrop-filter backdrop-blur-md bg-opacity-20 border border-gray-100
  justify-center">
            <li><a href="movies">Movies</a></li>
            <li><a href="series">Series</a></li>
            <li><a href="podcasts">Podcasts</a></li>
        </ul>
    </footer>
</div>

@stack('modals')

@livewireScripts
@laravelViewsScripts('laravel-views')
</body>
</html>
