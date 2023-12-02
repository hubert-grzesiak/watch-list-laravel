<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white/50 backdrop-blur-lg shadow-md overflow-hidden border-white border-[2px] sm:rounded-xl">
        {{ $slot }}
    </div>
</div>
