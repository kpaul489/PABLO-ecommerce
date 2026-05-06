<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Checkout') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('error'))
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                    {{ session('error') }}
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">Order Summary</h3>
                    <div class="divide-y divide-gray-200">
                        @foreach($cartItems as $item)
                            <div class="py-3 flex justify-between">
                                <div>
                                    <p class="font-medium">{{ $item['product']->name }}</p>
                                    <p class="text-sm text-gray-500">Qty: {{ $item['quantity'] }}</p>
                                </div>
                                <p class="font-medium">{{ number_format($item['subtotal'], 0) }} RWF</p>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-4 pt-4 border-t border-gray-200 flex justify-between">
                        <p class="text-lg font-bold">Total</p>
                        <p class="text-lg font-bold text-green-600">{{ number_format($total, 0) }} RWF</p>
                    </div>
                </div>

                <div class="bg-white shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">Shipping Information</h3>
                    <form action="{{ route('checkout.store') }}" method="POST">
                        @csrf
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Full Name</label>
                                <input type="text" value="{{ auth()->user()->name }}" class="mt-1 block w-full border-gray-300 rounded-md" readonly>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" value="{{ auth()->user()->email }}" class="mt-1 block w-full border-gray-300 rounded-md" readonly>
                            </div>
                            <div class="pt-4">
                                <button type="submit" class="w-full bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition font-semibold">
                                    Place Order
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
