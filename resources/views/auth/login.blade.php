<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-blue-50 to-indigo-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white shadow-xl overflow-hidden sm:rounded-2xl">
            <div class="flex flex-col items-center mb-8">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-indigo-600" />
                </a>
                <h2 class="mt-4 text-2xl font-bold text-gray-900">Welcome Back</h2>
                <p class="mt-1 text-sm text-gray-600">Sign in to your account</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-gray-700" />
                    <x-text-input id="email" class="block mt-1 w-full px-4 py-3 rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="email@example.com" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" class="text-gray-700" />
                    <x-text-input id="password" class="block mt-1 w-full px-4 py-3 rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-between mt-6">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-indigo-600 hover:text-indigo-800 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Forgot password?') }}
                        </a>
                    @endif

                    <x-primary-button class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>

                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-600">
                        Don't have an account?
                        <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-800">
                            Sign up
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
