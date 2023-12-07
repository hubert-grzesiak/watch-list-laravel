<!-- resources/views/livewire/shows/show-modal-info.blade.php -->
<div class="bg-[#1f1f1f] shadow-md p-[24px] max-w-[520px] max-h-[500px] h-full m-auto rounded-md">
    <!-- Check if the show is loaded -->
    @if($show)
        <div class="flex gap-[12px] mb-[12px]">
            <img src="{{ $show->image }}" alt="{{ $show->title }}" class="w-[72px] h-[106px]"/>
            <div>
                <h3 class="text-[24px] text-white">{{ $show->title }}</h3>
                <div class="flex gap-1">
                <p class="modalTextGreyInfo">{{ $show->year }}</p>
                    @php
                        $episodesText='';
                            if($show -> numberOfEpisodes > 1) {
                               $episodesText = $show -> numberOfEpisodes . ' episodes';
                            } else {
                                $episodesText = '';
                            }
                    @endphp
                    <span class="modalTextGreyInfo">&middot;</span>
                    <p class="modalTextGreyInfo">{{$episodesText}}</p>
                    @php
                        if($episodesText != ''){
                            echo '<span class="modalTextGreyInfo">&middot;</span>';
                        }
                    @endphp
                    <p class="capitalize modalTextGreyInfo">{{$show -> type}}</p>

                    </div>
                    <!-- Convert genre string to array and remove any whitespace from each genre -->

                <div class="modalTextGreyInfo">
                    @foreach($show->categories as $category)
                        @if(!$loop->first)
                            &middot;
                    @endif
                    {{ $category->name }}
                    @endforeach
                </div>
                <div class="flex flex-row items-center gap-1">
                    <svg width="13" height="13" xmlns="http://www.w3.org/2000/svg" class="text-[#f5c518] ipc-icon ipc-icon--star-inline" viewBox="0 0 24 24" fill="currentColor" role="presentation"><path d="M12 20.1l5.82 3.682c1.066.675 2.37-.322 2.09-1.584l-1.543-6.926 5.146-4.667c.94-.85.435-2.465-.799-2.567l-6.773-.602L13.29.89a1.38 1.38 0 0 0-2.581 0l-2.65 6.53-6.774.602C.052 8.126-.453 9.74.486 10.59l5.147 4.666-1.542 6.926c-.28 1.262 1.023 2.26 2.09 1.585L12 20.099z"></path></svg>
                    <span class="text-[16px] text-[#FFFFFFB3] ">{{ $show -> rating }}</span>
                </div>
            </div>

        </div>
        <p class="text-white mb-[12px]">{{ $show->description }}</p>
        <p class="mt-[12px] mb-[6px] modalTextGreyInfo">Available on:</p>
        <div class="flex gap-2">
            @if ($show->platforms->isNotEmpty())
                    @foreach ($show->platforms as $platform)
                        <p class="text-white bg-[#FFFFFF14] px-2 py-1 rounded-lg text-center w-fit text-[12px]">{{ $platform->name }}</p>
                    @endforeach
            @else
                <p>Aktualnie niedostępne na żadnej platformie.</p>
            @endif
        </div>
        <div class="pt-[12px]">
            <button  class="hover:opacity-[0.88] text-[#5799EF] flex bg-[#FFFFFF14] px-[16px] py-[7px] w-full rounded-[4px] items-center justify-center gap-[2px]">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="ipc-icon ipc-icon--add ipc-btn__icon ipc-btn__icon--pre" viewBox="0 0 24 24" fill="currentColor" role="presentation">
                    <path d="M18 13h-5v5c0 .55-.45 1-1 1s-1-.45-1-1v-5h-5c-.55 0-1-.45-1-1s.45-1 1-1h5V6c0-.55.45-1 1-1s1 .45 1 1v5h5c.55 0 1 .45 1 1s-.45 1-1 1z"/>
                </svg>
                <p>Watchlist</p>
            </button>
        </div>
        <!-- Add more details as needed -->
    @else
        <p>Details not found.</p>
    @endif
</div>
