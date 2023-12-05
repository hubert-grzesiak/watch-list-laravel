<x-layout>
    <div class="container max-w-lg mx-auto bg-gray-300">

        <!-- Modal -->
        <div>
            <div class="fixed inset-0 bg-gray-900 opacity-90"></div>

            <div class="bg-white shadow-md p-4 max-w-sm h-48 m-auto rounded-md fixed inset-0">
                <div class="flex flex-col h-full justify-between">

                    <header>
                        <h3 class="font-bold text-lg">Are You Sure?</h3>
                    </header>

                    <main class="mb-4">
                        <p>If you proceed, your account will be deleted entirely.</p>
                    </main>

                    <footer>
                        <button class="bg-gray-400 hover:bg-gray-500 text-xs uppercase py-2 px-4 rounded-md text-white transition-all duration-200 mr-2">Cancel</button>
                        <button class="bg-blue-400 hover:bg-blue-500 text-xs uppercase py-2 px-4 rounded-md text-white transition-all duration-200">Continue</button>
                    </footer>
                </div>
            </div>
        </div>

    </div>
</x-layout>
