<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Shop') }}
            </h2>
            <div class="text-sm text-gray-500">
                {{ $products->total() }} products
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @forelse($products as $product)
                    <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 group">
                        <div class="block aspect-square bg-gradient-to-br from-gray-100 to-gray-200 overflow-hidden relative">
                            <img
                                src="{{ $product->image_url }}"
                                alt="{{ $product->name }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                            >
                            <div class="hidden w-full h-full bg-gray-200 items-center justify-center">
                                <span class="text-gray-400 text-sm">No image</span>
                            </div>
                            @if($product->stock <= 5 && $product->stock > 0)
                                <span class="absolute top-3 right-3 bg-yellow-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg">
                                    Low Stock
                                </span>
                            @elseif($product->stock == 0)
                                <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                                    <span class="text-white font-bold text-lg">Out of Stock</span>
                                </div>
                            @endif
                            <div class="absolute top-3 left-3">
                                <span class="bg-white bg-opacity-90 backdrop-blur-sm text-green-600 font-bold px-3 py-1 rounded-full shadow-lg">
                                    {{ number_format($product->price, 0) }} RWF
                                </span>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2 line-clamp-1">{{ $product->name }}</h3>
                            <p class="text-gray-500 text-sm mb-4 line-clamp-2 min-h-[2.5rem]">{{ $product->description }}</p>
                            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                                @if($product->stock > 0)
                                    <span class="text-xs bg-green-100 text-green-700 px-3 py-1 rounded-full font-medium">In Stock ({{ $product->stock }})</span>
                                @else
                                    <span class="text-xs bg-red-100 text-red-700 px-3 py-1 rounded-full font-medium">Out of Stock</span>
                                @endif
                                @auth
                                    @if($product->stock > 0)
                                        <form action="{{ route('cart.add', $product) }}" method="POST" class="inline">
                                            @csrf
                                            <input type="hidden" name="quantity" value="1">
                                            <button
                                                type="submit"
                                                class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 active:bg-indigo-800 transition-colors duration-200 font-medium text-sm shadow-md hover:shadow-lg"
                                            >
                                                Add to Cart
                                            </button>
                                        </form>
                                    @endif
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition-colors duration-200 font-medium text-sm shadow-md hover:shadow-lg"
                                    >
                                        Login to Buy
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-20">
                        <div class="bg-white rounded-2xl shadow-lg p-12">
                            <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                            <p class="mt-6 text-gray-500 text-xl font-medium">No products available.</p>
                            <p class="mt-2 text-gray-400">Check back later for new arrivals!</p>
                        </div>
                    </div>
                @endforelse
            </div>

            @if($products->hasPages())
                <div class="mt-10">
                    {{ $products->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
