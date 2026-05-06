<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <h1 class="text-2xl font-bold mb-4">Dashboard</h1>

                <p class="text-gray-700">
                    You are logged in!
                </p>

                <div class="mt-6 flex gap-4">
                    <a href="/" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                        Shop
                    </a>

                    <a href="/cart" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                        Cart
                    </a>

                    @if(auth()->user()->role === 'admin')
                        <a href="/admin" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                            Admin
                        </a>
                    @endif
                </div>

            </div>

        </div>
    </div>
</x-app-layout>