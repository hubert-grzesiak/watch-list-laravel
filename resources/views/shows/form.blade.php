<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('translation.navigation.shows') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg">
                @if (isset($show))
                    <livewire:shows.show-form :show="$show" :editMode="true" />
                @else
                    <livewire:shows.show-form :editMode="false" />
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
