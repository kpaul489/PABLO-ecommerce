<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shopping Cart') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            @if(count($cartItems) > 0)
                <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Product</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Price</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Quantity</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Subtotal</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($cartItems as $item)
                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <img
                                                src="{{ $item['product']->image_url }}"
                                                alt="{{ $item['product']->name }}"
                                                class="w-16 h-16 object-cover rounded-lg border border-gray-200"
                                                onerror="this.onerror=null;this.src='{{ asset('images/placeholder.png') }}';"
                                            >
                                            <div class="ml-4">
                                                <p class="text-sm font-medium text-gray-900">{{ $item['product']->name }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ number_format($item['product']->price, 0) }} RWF</td>
                                    <td class="px-6 py-4">
                                        <form action="{{ route('cart.update', $item['product']->id) }}" method="POST" class="flex items-center">
                                            @csrf
                                            @method('PATCH')
                                            <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" max="{{ $item['product']->stock }}" class="w-20 border-gray-300 rounded-lg">
                                            <button type="submit" class="ml-2 text-blue-600 hover:text-blue-800 text-sm font-medium">Update</button>
                                        </form>
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ number_format($item['subtotal'], 0) }} RWF</td>
                                    <td class="px-6 py-4">
                                        <form action="{{ route('cart.remove', $item['product']->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-medium">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="px-6 py-5 bg-gray-50 flex flex-col sm:flex-row justify-between items-center gap-4">
                        <p class="text-lg font-semibold">Total: <span class="text-green-600 text-xl">{{ number_format($total, 0) }} RWF</span></p>
                        <a href="{{ route('checkout.index') }}" class="bg-green-600 text-white px-6 py-2.5 rounded-lg hover:bg-green-700 transition font-medium">
                            Proceed to Checkout
                        </a>
                    </div>
                </div>
            @else
                <div class="bg-white shadow-sm sm:rounded-lg p-12 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"/>
                    </svg>
                    <p class="mt-4 text-gray-500 text-lg">Your cart is empty.</p>
                    <a href="{{ route('home') }}" class="mt-4 inline-block text-blue-600 hover:text-blue-800 font-medium">Continue Shopping</a>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
