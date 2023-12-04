<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('translation.navigation.shows') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-black">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow-xl sm:rounded-lg p-4" id="table-view-wrapper">
                <livewire:shows.shows-grid-view />
            </div>
        </div>
    </div>
</x-app-layout>
