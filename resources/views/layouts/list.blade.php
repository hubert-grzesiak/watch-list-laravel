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
    <footer class="flex w-full justify-center shadow py-10 gap-[12px] items-end">
        <div class="flex flex-col gap-2">
            <label for="subscriber_email" class="">Subscribe to our newsletter</label>
            <input type="email" name="subscriber_email" id="subscriber_email" placeholder="Enter email.." required class="rounded px-6 py-2 w-[250px]">
        </div>
        <button onclick="addSubscriber();" class="bg-[#F8E0C9] px-6 py-[9px] rounded transition-transform transform-gpu active:scale-95">Subscribe</button>
    </footer>
</div>

@stack('modals')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

@livewireScripts
@laravelViewsScripts('laravel-views')
</body>
</html>
