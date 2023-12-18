<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('translation.navigation.platforms') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg table-view-wrapper">
                <div class="grid justify-items-stretch pt-2 pr-2">
                    @can('create', App\Models\Platform::class)
                        <x-wireui-button primary
                                  label="{{ __('platforms.actions.create') }}"
                                  href="{{ route('platforms.create') }}"
                                  class="justify-self-end bg-accent focus:outline-primary focus:border-none" />
                    @endcan
                </div>
                <livewire:platforms.platforms-table-view />
            </div>
        </div>
    </div>
</x-app-layout>

