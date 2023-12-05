{{-- grid-view.grid-view

Base layout to render all the UI componentes related to the grid view, this is the main file for this view,
the rest of the files are included from here

You can customize all the html and css classes but YOU MUST KEEP THE BLADE AND LIVEWIERE DIRECTIVES

--}}
@php
 // Mapped this tailwindcss utilities so they can be prged
 $cols = [
   1 => 'xl:grid-cols-1',
   2 => 'xl:grid-cols-2',
   3 => 'xl:grid-cols-3',
   4 => 'xl:grid-cols-4',
   5 => 'xl:grid-cols-5',
   6 => 'xl:grid-cols-6',
   7 => 'xl:grid-cols-7',
   8 => 'xl:grid-cols-8',
   9 => 'xl:grid-cols-9',
   10 => 'xl:grid-cols-10',
   11 => 'xl:grid-cols-11',
   12 => 'xl:grid-cols-12',
 ]
@endphp
<x-lv-layout>
  {{-- Search input and filters --}}
  <div class="mb-2">
    @include('laravel-views::components.toolbar.toolbar')
  </div>

  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 {{ $cols[$maxCols] }} gap-8 md:gap-8">
    @foreach ($items as $item)
      <div class="flex justify-center">
        @if ($this->hasBulkActions)
          <div class="flex justify-center">
            <x-lv-checkbox wire:model="selected" value="{{ $item->getKey() }}"/>
          </div>
        @endif
        <x-lv-dynamic-component
          :view="$cardComponent"
          :data="array_merge($this->card($item), [
              'withBackground' => $withBackground,
              'model' => $item,
              'actions' => $actionsByRow,
              'hasDefaultAction' => $this->hasDefaultAction,
              'selected' => in_array($item->getKey(), $selected)
            ])"
        />
      </div>
    @endforeach
  </div>

  {{-- Paginator, loading indicator and totals --}}
  <div class="mt-8">
    {{ $items->links() }}
  </div>
</x-lv-layout>
