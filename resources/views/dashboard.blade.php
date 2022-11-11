<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-blue-400">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-blue-400">
            <div class="bg-blue-400 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-blue-400 border-b border-gray-200">
                    You're logged in!
                </div>
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e8/Tigre.jpg/800px-Tigre.jpg" width="120" height="75" />
            </div>
        </div>
    </div>
</x-app-layout>
