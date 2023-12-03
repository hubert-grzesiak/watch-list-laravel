@props([
    'title' => '',
    'description' => '',
    'image' => '',
    'manufacturer' => '',
    'withBackground' => false,
    'model',
    'actions' => [],
    'hasDefaultAction' => false,
    'selected' => false,
    // New properties for shows
    'genre' => '',
    'rating' => '',
    'year' => '',
    'numberOfEpisodes' => null, // Nullable for movies
    'platform' => '',
    'type' => '',
])

<div class="{{ $withBackground ? 'rounded-md shadow-md' : '' }}">
    <!-- Image and title display remains unchanged -->

    <div class="pt-4 {{ $withBackground ? 'bg-white rounded-b-md p-4' : '' }}">
        <div class="flex items-start">
            <!-- Existing content display -->

            <!-- New section for show details -->
            <div class="flex-1">
                @if ($genre)
                    <span class="text-sm text-gray-600">{{ __('Show Genre:') }} {!! $genre !!}</span>
                @endif
                @if ($rating)
                    <span class="text-sm text-gray-600">{{ __('Rating:') }} {!! $rating !!}</span>
                @endif
                @if ($year)
                    <span class="text-sm text-gray-600">{{ __('Year:') }} {!! $year !!}</span>
                @endif
                @if ($numberOfEpisodes)
                    <span class="text-sm text-gray-600">{{ __('Episodes:') }} {!! $numberOfEpisodes !!}</span>
                @endif
                @if ($platform)
                    <span class="text-sm text-gray-600">{{ __('Platform:') }} {!! $platform !!}</span>
                @endif
                @if ($type)
                    <span class="text-sm text-gray-600">{{ __('Type:') }} {!! $type !!}</span>
                @endif
            </div>

            <!-- Existing action button display -->
        </div>

        <!-- Existing description display -->
    </div>
</div>
