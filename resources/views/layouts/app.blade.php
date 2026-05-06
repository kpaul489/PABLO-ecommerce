<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 flex flex-col">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="flex-grow">
                {{ $slot }}
            </main>

            <!-- Footer -->
            <footer class="bg-gray-800 text-white mt-auto">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">
                        <div>
                            <h3 class="text-lg font-semibold mb-3">Our Store</h3>
                            <p class="text-gray-400 text-sm">Your one-stop shop for quality products at great prices.</p>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold mb-3">Contact Us</h3>
                            <p class="text-gray-400 text-sm">Kabuga near Inyange</p>
                            <p class="text-gray-400 text-sm mt-1">
                                <a href="tel:+250786599249" class="hover:text-white transition">+250 786 599 249</a>
                            </p>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold mb-3">Quick Links</h3>
                            <ul class="space-y-2 text-sm">
                                <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-white transition">Shop</a></li>
                                @auth
                                    <li><a href="{{ route('cart.index') }}" class="text-gray-400 hover:text-white transition">Cart</a></li>
                                @endauth
                            </ul>
                        </div>
                    </div>
                    <div class="border-t border-gray-700 mt-8 pt-6 text-center">
                        <p class="text-gray-400 text-sm">&copy; {{ date('Y') }} Our Store. All rights reserved.</p>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
