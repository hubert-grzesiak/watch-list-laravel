<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('translation.navigation.categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg table-view-wrapper">
                <div class="grid justify-items-stretch pt-2 pr-2 font-mono!">
                    @can('create', App\Models\Category::class)
                        <x-wireui-button primary
                                  label="{{ __('categories.actions.create') }}"
                                  href="{{ route('categories.create') }}"
                                  class="justify-self-end bg-accent text-primary focus:outline-primary focus:border-none" />
                    @endcan
                </div>
                <livewire:categories.categories-table-view />
            </div>
        </div>
    </div>
</x-app-layout>

