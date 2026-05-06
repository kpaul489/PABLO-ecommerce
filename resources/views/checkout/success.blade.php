<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order Successful') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-8 text-center">
                <div class="mb-4">
                    <svg class="mx-auto h-16 w-16 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">Order Placed Successfully!</h3>
                <p class="text-gray-600 mb-6">Thank you for your purchase. Your order is being processed.</p>
                <a href="{{ route('home') }}" class="inline-block bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                    Continue Shopping
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
