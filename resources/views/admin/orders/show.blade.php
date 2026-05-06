<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Order #') }}{{ $order->id }}
            </h2>
            <a href="{{ route('admin.orders.index') }}" class="text-blue-600 hover:text-blue-800">Back to Orders</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-sm font-medium text-gray-500 mb-1">Customer</h3>
                    <p class="text-lg font-semibold">{{ $order->user->name }}</p>
                    <p class="text-gray-600">{{ $order->user->email }}</p>
                </div>

                <div class="bg-white shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-sm font-medium text-gray-500 mb-1">Total</h3>
                    <p class="text-lg font-semibold text-green-600">{{ number_format($order->total_price, 0) }} RWF</p>
                </div>

                <div class="bg-white shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-sm font-medium text-gray-500 mb-1">Status</h3>
                    <form action="{{ route('admin.orders.update', $order) }}" method="POST" class="flex items-center space-x-2">
                        @csrf
                        @method('PATCH')
                        <select name="status" class="border-gray-300 rounded">
                            <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                        <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition text-sm">Update</button>
                    </form>
                </div>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold">Order Items</h3>
                </div>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Product</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Price</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Quantity</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($order->orderItems as $item)
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $item->product->name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-900">{{ number_format($item->price, 0) }} RWF</td>
                                <td class="px-6 py-4 text-sm text-gray-900">{{ $item->quantity }}</td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ number_format($item->price * $item->quantity, 0) }} RWF</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
