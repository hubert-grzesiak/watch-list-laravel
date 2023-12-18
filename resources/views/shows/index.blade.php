<x-shows-layout>
    <div class="w-full bg-black flex justify-center items-center">
        <div id="carouselExampleAutoplaying" class="carousel slide max-w-6xl mx-auto sm:px-6 lg:px-8" data-bs-ride="carousel">
            <div class="carousel-inner px-4 w-full md:h-[500px] h-[300px] relative overflow-hidden">
                <div class="carousel-item active relative">
                    <img src="https://res.cloudinary.com/dev6yhoh3/image/upload/v1702735298/hlhtqla3myzxpzahiro5.webp" class="w-full" alt="Diuna Część druga">
                    <div class="p-4 pt-2 pb-10 absolute top-[430px] w-full bg-black/50 z-10">
                        <h2 class=" z-10 text-[45px] text-white">Dune: Part Two - 15th of March 2024</h2>
                    </div>
                </div>
                <div class="relative carousel-item">
                    <img src="https://res.cloudinary.com/dev6yhoh3/image/upload/v1702735297/h2ogkhoey8dmckdhjvgx.jpg" class="w-full" alt="Joker 2">
                    <div class="p-4 pt-2 pb-10 absolute top-[430px] w-full bg-black/50 z-10">
                        <h2 class=" z-10 text-[45px] text-white">Joker: Folie à deux - 4h of October 2024</h2>
                    </div>
                </div>
                <div class="relative carousel-item">
                    <img src="https://res.cloudinary.com/dev6yhoh3/image/upload/v1702735298/a1ztrmchgbbtg6sk2clz.jpg" class="w-full" alt="Kung Fu Panda 4">
                    <div class="p-4 pt-2 pb-10 absolute top-[430px] w-full bg-black/50 z-10">
                        <h2 class=" z-10 text-[45px] text-white">Kung Fu Panda 4 - 7th of March 2024</h2>
                    </div>
                </div>
                <div class="relative carousel-item">
                    <img src="https://res.cloudinary.com/dev6yhoh3/image/upload/v1702739211/rpso8bswovziia0afcwu.png" class="w-full" alt="Madam Web">
                    <div class="p-4 pt-2 pb-10 absolute top-[430px] w-full bg-black/50 z-10">
                        <h2 class=" z-10 text-[45px] text-white">Madame Web - 14th of February 2024</h2>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="py-12 bg-black">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow-xl sm:rounded-lg p-4" id="table-view-wrapper">
                <div class="flex justify-end pb-2">
                    @can('create', App\Models\Show::class)
                        <x-wireui-button primary label="{{ __('shows.actions.create') }}" href="{{ route('shows.create') }}" class="justify-self-end bg-white text-black" />
                    @endcan
                </div>
                <livewire:shows.shows-grid-view/>
            </div>
        </div>
    </div>
</x-shows-layout>
