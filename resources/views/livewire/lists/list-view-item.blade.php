@props([
    'title' => '',
    'description' => '',
    'image' => '',
    'withBackground' => false,
    'model',
    'id',
    'actions' => [],
    'hasDefaultAction' => true,
    'selected' => false,
    'genre' => '',
    'rating' => '',
    'year' => '',
    'numberOfEpisodes' => null, // Nullable for movies
    'platform' => '',
    'type' => '',

])
{{--{{dd($image)}}--}}

<div>
    <div class="flex items-center space-x-4 ">
        <div>
            <img src="{{ $image }}" alt="{{$title}}" class="w-[120px] h-[120px]  shadow-inner bg-white object-cover">
        </div>

        <div class="flex-1">
            <div class="text-sm font-medium text-gray-900">
                {{ $title }}
            </div>
            <div class="text-sm">
                {!! $numberOfEpisodes !!}
            </div>
        </div>
        <x-lv-actions :actions="$actions" :model="$model" />
    </div>
</div>
