<x-list-layout class="">
    <div class="relative top-0 w-full h-[300px] overflow-hidden">
        <img alt="bg" class="absolute w-full object-cover translate-y-[-260px]" src="https://res.cloudinary.com/dev6yhoh3/image/upload/v1700065888/vggq0tew5sshhy3rtx4u.webp" />
    </div>
    <div class="sticky transition duration-200 top-0 translate-y-[-65px] flex w-full justify-center shadow z-10">
        <ul class="flex w-full gap-10 py-5 text-xl h-full text-white w-full bg-white bg-clip-padding backdrop-filter backdrop-blur-md bg-opacity-20 border border-gray-100
  justify-center">
            <li><a href="/list?sortOrder=asc&filters[show-filter]=" class="">All Titles</a></li>
            <li><a href="/list?sortOrder=asc&filters[show-filter]=watching">Currently Watching</a></li>
            <li><a href="/list?sortOrder=asc&filters[show-filter]=completed">Completed</a></li>
            <li><a href="/list?sortOrder=asc&filters[show-filter]=plan_to_watch">Plan To Watch</a></li>
        </ul>
    </div>
    <div class="flex justify-center items-center flex-col w-full">
                <div class="bg-white/40 backdrop-blur-md sm:rounded-lg w-[90%]">
                    <livewire:lists.list-table-view />
                </div>
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
</x-list-layout>

