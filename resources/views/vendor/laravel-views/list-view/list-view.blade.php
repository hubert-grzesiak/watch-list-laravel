<x-lv-layout>
  {{-- Search input and filters --}}
  <div class="px-4">
    @include('laravel-views::components.toolbar.toolbar')
  </div>

  <div class="w-full border">
    @foreach ($items as $item)
      <div class="flex items-center border-b border-gray-200 w-full ">
        @if ($this->hasBulkActions)
          <div class="h-full flex items-center pl-3 md:pl-4 w-full">
            <x-lv-checkbox wire:model="selected" value="{{ $item->getKey() }}" />
          </div>
        @endif
        <div class="py-2 px-3 md:px-4 flex-1 w-full ">
          <x-lv-dynamic-component class="w-full" :view="$itemComponent" :data="array_merge($this->data($item) , ['actions' => $actionsByRow, 'model' => $item])" />
        </div>
      </div>
    @endforeach
  </div>

  {{-- Paginator, loading indicator and totals --}}
  <div class="mt-8 px-4">
    {{ $items->links() }}
  </div>
</x-lv-layout>
