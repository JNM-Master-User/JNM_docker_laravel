<x-guest-layout>
    @include('layouts.navigation_public')
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <!-- Remember Me -->
            <div class="mt-4">
                <div class="flex items-start text-sm">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                        <span class="ml-2 text-sm text-gray-600 dark:text-white">{{ __('Remember me') }}</span>
                    </label>
                @if (Route::has('password.request'))
                    <a class="ml-auto underline hover:underline no-underline text-red-700 font-bold"
                       href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                </div>
            </div>

            <div class="mt-4 text-sm w-full">
                <x-buttons.form-button name="{{ __('Log In') }}"></x-buttons.form-button>
            </div>
            <div class="my-4 w-full text-sm dark:text-white">
                {{ __('No account yet?') }}
                <a href="{{ route('register') }}" class="ml-1 underline hover:underline no-underline text-red-700 font-bold" href="{{ route('login') }}">
                    {{ __('Create Account') }}
                </a>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
