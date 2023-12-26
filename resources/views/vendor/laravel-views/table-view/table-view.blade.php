{{-- table-view.table-view

Base layout to render all the UI componentes related to the table view, this is the main file for this view,
the rest of the files are included from here

You can customize all the html and css classes but YOU MUST KEEP THE BLADE AND LIVEWIERE DIRECTIVES

UI components used:
  - table-view.filters
  - components.alert
  - components.table
  - components.paginator --}}

<x-lv-layout>
  {{-- Search input and filters --}}
  <div class="py-4 px-3 pb-0">
    @include('laravel-views::components.toolbar.toolbar')
  </div>

  @if (count($items))
    {{-- Content table --}}
    <div class="overflow-x-scroll lg:overflow-x-visible">
      @include('laravel-views::components.table')
    </div>

  @else
    {{-- Empty data message --}}
    <div class="flex justify-center items-center p-4">
{{--      <h3>{{ __('searching.no_items') }}</h3>--}}
        <img alt="no shows" src="https://res.cloudinary.com/dev6yhoh3/image/upload/v1703369259/DALL_E_2023-12-23_23.07.11_-_An_image_featuring_a_film_slate_in_the_center_with_the_words_No_shows_yet_please_add_something_to_your_list_written_on_it._The_background_is_simp_fm5yzh.png" class="w-[250px] h-[250px] rounded-full mt-5 round-image-container"/>
    </div>
  @endif

  {{-- Paginator, loading indicator and totals --}}
  <div class="p-4">
    {{ $items->links() }}
  </div>
</x-lv-layout>

