<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Logs
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="sm:rounded-lg ">
                <div class="p-4 flex flex-col gap-1">
                    <h3 class="text-lg font-semibold">Logi:</h3>
                    <div class="flex flex-col-reverse">
                    @foreach ($logLines as $line)
                        <p class="rounded-[10px] bg-primary text-secondary overflow-x-scroll p-4">{{ $line }}</p>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
