<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <a href="{{ route('admin.products.index') }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 hover:shadow-md transition">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Manage Products</h3>
                    <p class="text-gray-600">Add, edit, and delete products</p>
                </a>
                <a href="{{ route('admin.orders.index') }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 hover:shadow-md transition">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Manage Orders</h3>
                    <p class="text-gray-600">View and update order status</p>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
