@props([
    'title' => '',
    'description' => '',
    'image' => '',
    'manufacturer' => '',
    'withBackground' => false,
    'model',
    'actions' => [],
    'hasDefaultAction' => true,
    'selected' => false,
    // New properties for shows
    'genre' => '',
    'rating' => '',
    'year' => '',
    'numberOfEpisodes' => null, // Nullable for movies
    'platform' => '',
    'type' => '',
])

<div class="w-[185.33px] h-[458px] bg-[#1a1a1a] rounded-b-[4px]">
    <!-- Image and title display -->
    <div class="relative h-[274.27px] overflow-hidden">
        @if ($hasDefaultAction)
            <a href="#!" wire:click.prevent="onCardClick({{ $model->id }})">
                <img src="{{ $image }}" alt="{{ $title }}" class="w-[190px] h-[280px] w-full object-contain scale-[1.1] ">
            </a>
        @else
            <img src="{{ $image }}" alt="{{ $title }}" class="w-[190px] h-[280px] w-full object-contain scale-[1.1]">
        @endif
    </div>

    <!-- Card Body -->
    <div class="card-body px-[8px] py-[10px] ">
        <div class="flex flex-row items-center gap-1">
            <img class="w-[13px] h-[13px]" src="https://res.cloudinary.com/dev6yhoh3/image/upload/v1701726275/g8r6lgs57qfgjuybcjkv.svg" alt="star">
            <span class="text-[16px] text-[#FFFFFFB3] text-yellow-400">{{ $rating }}</span>
        </div>
        <div class="h-[40px]">
            <p class="text-white text-[16px]">{{$title}}</p>
        </div>
        <div class="pt-[12px]">
            <button class="text-[#5799EF] flex bg-[#FFFFFF14] px-[16px] py-[7px] w-full rounded-[4px] items-center justify-center gap-[2px]">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="ipc-icon ipc-icon--add ipc-btn__icon ipc-btn__icon--pre" viewBox="0 0 24 24" fill="currentColor" role="presentation">
                    <path d="M18 13h-5v5c0 .55-.45 1-1 1s-1-.45-1-1v-5h-5c-.55 0-1-.45-1-1s.45-1 1-1h5V6c0-.55.45-1 1-1s1 .45 1 1v5h5c.55 0 1 .45 1 1s-.45 1-1 1z"/>
                </svg>
                <p>Watchlist</p>
            </button>
        </div>
        <div class="pt-[8px] flex justify-between items-center text-white">
            <div class="flex gap-1">
            <button class="p-[12px]">-</button>
            <button class="p-[12px]">+</button>
            </div>
            <button class="p-[12px]">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="ipc-icon ipc-icon--info" viewBox="0 0 24 24" fill="currentColor" role="presentation"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M11 7h2v2h-2zm0 4h2v6h-2zm1-9C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"></path></svg>
            </button>

        </div>
{{--        <div class="flex justify-between items-center mt-2">--}}
{{--            <span class="text-sm text-gray-600">{{ $genre }}</span>--}}

{{--        </div>--}}


        <!-- Additional Show Details -->
{{--        <div class="show-details my-2">--}}
{{--            @if ($year)--}}
{{--                <span class="text-sm text-gray-600">{{ __('Year:') }} {{ $year }}</span>--}}
{{--            @endif--}}
{{--            @if ($numberOfEpisodes > 1)--}}
{{--                <span class="text-sm text-gray-600">{{ __('Episodes:') }} {{ $numberOfEpisodes }}</span>--}}
{{--            @endif--}}
{{--            @if ($platform)--}}
{{--                <span class="text-sm text-gray-600">{{ __('Platform:') }} {{ $platform }}</span>--}}
{{--            @endif--}}
{{--            @if ($type)--}}
{{--                <span class="text-sm text-gray-600">{{ __('Type:') }} {{ $type }}</span>--}}
{{--            @endif--}}
{{--        </div>--}}

        <!-- Actions (e.g., Watch Options, Trailer) -->
{{--        <div class="actions">--}}
{{--            <button class="watch-options-btn">Watch options</button>--}}
{{--            <button class="trailer-btn">Trailer</button>--}}
{{--        </div>--}}
    </div>
</div>
