@props([
    'title' => '',
    'description' => '',
    'image' => '',
    'manufacturer' => '',
    'withBackground' => false,
    'model',
    'id',
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
            <svg width="13" height="13" xmlns="http://www.w3.org/2000/svg" class="text-[#f5c518] ipc-icon ipc-icon--star-inline" viewBox="0 0 24 24" fill="currentColor" role="presentation"><path d="M12 20.1l5.82 3.682c1.066.675 2.37-.322 2.09-1.584l-1.543-6.926 5.146-4.667c.94-.85.435-2.465-.799-2.567l-6.773-.602L13.29.89a1.38 1.38 0 0 0-2.581 0l-2.65 6.53-6.774.602C.052 8.126-.453 9.74.486 10.59l5.147 4.666-1.542 6.926c-.28 1.262 1.023 2.26 2.09 1.585L12 20.099z"></path></svg>
            <span class="text-[16px] text-[#FFFFFFB3] ">{{ $rating }}</span>
        </div>
        <div class="h-[40px]">
            <p class="text-white text-[16px] line-clamp-2">{{$title}}</p>
        </div>
        <div class="pt-[12px]">
            <button  class="text-[#5799EF] flex bg-[#FFFFFF14] px-[16px] py-[7px] w-full rounded-[4px] items-center justify-center gap-[2px]">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="ipc-icon ipc-icon--add ipc-btn__icon ipc-btn__icon--pre" viewBox="0 0 24 24" fill="currentColor" role="presentation">
                    <path d="M18 13h-5v5c0 .55-.45 1-1 1s-1-.45-1-1v-5h-5c-.55 0-1-.45-1-1s.45-1 1-1h5V6c0-.55.45-1 1-1s1 .45 1 1v5h5c.55 0 1 .45 1 1s-.45 1-1 1z"/>
                </svg>
                <p>Watchlist</p>
            </button>
        </div>
        <div class="pt-[8px] flex justify-between items-center text-white">
            <div class="flex gap-1">
            <button class="p-[12px]">More info</button>
            </div>
            <dialog class="relative myOverlay bg-[#1f1f1f] shadow-md p-[24px] max-w-[520px] h-[320px] m-auto rounded-md">
             <img src="{{ $image }}" alt="{{ $title }}" class="w-[72px] h-[106px] w-full object-contain">
                <button autofocus class="absolute top-[-10px] right-[0] text-white z-[1000]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="ipc-icon ipc-icon--clear" viewBox="0 0 24 24" fill="currentColor" role="presentation"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M18.3 5.71a.996.996 0 0 0-1.41 0L12 10.59 7.11 5.7A.996.996 0 1 0 5.7 7.11L10.59 12 5.7 16.89a.996.996 0 1 0 1.41 1.41L12 13.41l4.89 4.89a.996.996 0 1 0 1.41-1.41L13.41 12l4.89-4.89c.38-.38.38-1.02 0-1.4z"></path></svg>
                </button>

                <button class="text-[#5799EF] flex bg-[#FFFFFF14] px-[16px] py-[7px] w-full rounded-[4px] items-center justify-center gap-[2px]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="ipc-icon ipc-icon--add ipc-btn__icon ipc-btn__icon--pre" viewBox="0 0 24 24" fill="currentColor" role="presentation">
                            <path d="M18 13h-5v5c0 .55-.45 1-1 1s-1-.45-1-1v-5h-5c-.55 0-1-.45-1-1s.45-1 1-1h5V6c0-.55.45-1 1-1s1 .45 1 1v5h5c.55 0 1 .45 1 1s-.45 1-1 1z"/>
                        </svg>
                        <p>Watchlist</p>
                </button>
            </dialog>
            <button class="p-[12px]" wire:click="$emit('openModal', 'show-modal-info', {{ json_encode(['id' => $model->id]) }})">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="ipc-icon ipc-icon--info" viewBox="0 0 24 24" fill="currentColor" role="presentation"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M11 7h2v2h-2zm0 4h2v6h-2zm1-9C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"></path></svg>
            </button>

        </div>

    </div>
</div>


