@props(['theme' => 'light'])

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Watch Lists') }}</title>
    {{--    <title> @yield('title') </title>--}}
    <!-- Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @livewireStyles
    @laravelViewsStyles('laravel-views')

    <!-- Scripts -->
    @wireUiScripts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/@alpinejs/focus@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body class="font-sans antialiased">
<x-banner />
<x-wireui-notifications />
<x-wireui-dialog />

<div class="relative flex flex-col justify-between h-[100vh]">
    <x-navigation-menu-dark :theme="'dark'" />

    <!-- Page Content -->
    <main class="">
        {{ $slot }}
    </main>
    <footer class="flex w-full justify-center shadow w-full bg-[#1a1a1a] bg-clip-padding text-white py-10 gap-[12px] items-end">
        <div class="flex flex-col gap-2">
            <label for="subscriber_email" class="">Subscribe to our newsletter</label>
            <input type="email" name="subscriber_email" id="subscriber_email" placeholder="Enter email.." required class="rounded px-6 py-2 w-[250px] text-black">
        </div>
        <button onclick="addSubscriber();" class="bg-[#F8E0C9] text-black px-6 py-[9px] rounded transition-transform transform-gpu active:scale-95">Subscribe</button>
    </footer>
</div>

@stack('modals')

@livewireScripts
@laravelViewsScripts('laravel-views')
@livewire('livewire-ui-modal')
</body>
</html>
