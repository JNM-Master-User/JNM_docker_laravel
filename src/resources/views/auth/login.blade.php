<x-guest-layout>
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
            <div class="flex justify-between mt-4">
                <label for="remember_me"
                       class="inline-flex items-center">
                    <input id="remember_me"
                           type="checkbox"
                           class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            @if (Route::has('password.request'))
                <span></span>
                <a class="underline items-right text-sm text-gray-600 hover:text-gray-900"
                   href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900"
                   href="{{ route('register') }}">
                    {{ __('No account yet?') }}
                </a>
                <x-buttons.primary-button id="button_w_toggling_spinner_login">
                    <x-icons.spinner class="hidden"></x-icons.spinner>
                    <span >{{ __('Log in') }}</span>
                    <span class="sr-only"> {{ __('Log in') }}</span>
                </x-buttons.primary-button>
                <script type="text/javascript">
                    const button_w_toggling_spinner_login = document.getElementById("button_w_toggling_spinner_login");
                    button_w_toggling_spinner_login.addEventListener('click', () => {
                        button_w_toggling_spinner_login.firstElementChild.classList.toggle('hidden');
                    });
                </script>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
