<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500"/>
            </a>
        </x-slot>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')"/>
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                              placeholder="name@gmail.com" required/>
                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
            </div>
            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')"/>
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                              placeholder="••••••••" required autocomplete="new-password"/>
                <x-input-error :messages="$errors->get('password')" class="mt-2"/>
            </div>
            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')"/>
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                              name="password_confirmation" placeholder="••••••••" required/>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
            </div>
            <div class="grid gap-4 mt-4 md:grid-cols-2">
                <div>
                    <!-- nom -->
                    <x-input-label for="name" :value="__('Name')"/>
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                                  placeholder="{{__('John')}}" required/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                </div>
                <div>
                    <!-- prenom -->
                    <x-input-label for="last_name" :value="__('Last Name')"/>
                    <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                                  :value="old('last_name')" placeholder="{{__('Doe')}}" required/>
                    <x-input-error :messages="$errors->get('last_name')" class="mt-2"/>
                </div>
                <div>
                    <!-- date naissance -->
                    <x-input-label for="date_of_birth" :value="__('Date of Birth')"/>
                    <x-text-input id="date_of_birth" class="block mt-1 w-full" type="date" name="date_of_birth"
                                  :value="old('date_of_birth')" placeholder="" required/>
                    <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2"/>
                </div>
                <div>
                    <!-- num tel -->
                    <x-input-label for="phone_number" :value="__('Phone number')"/>
                    <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number"
                                  :value="old('phone_number')" placeholder="{{__('+33612345678')}}" required/>
                    <x-input-error :messages="$errors->get('phone_number')" class="mt-2"/>
                </div>
                <div>
                    <x-input-label for="address" :value="__('Address')"/>
                    <x-text-input id="address" class="block mt-1 w-full" type="text" name="address"
                                  :value="old('address')" placeholder="{{__('ex: 3 Rue Charles de Gaulle')}}" required/>
                    <x-input-error :messages="$errors->get('address')" class="mt-2"/>
                </div>
                <div>
                    <x-input-label for="zip_code" :value="__('Zip code')"/>
                    <x-text-input id="zip_code" class="block mt-1 w-full" type="text" name="zip_code"
                                  :value="old('zip_code')" placeholder="{{__('75000')}}" required/>
                    <x-input-error :messages="$errors->get('zip_code')" class="mt-2"/>
                </div>
                <!-- statut -->
                <div>
                    <x-input-label :value="__('Select your status')"/>
                    @foreach($users_status as $user_status)
                        <div>
                            <label for="register_status" class="inline-flex items-center">
                                <input id="register_status" value="{{ $user_status->id}}" type="checkbox"
                                       name="type_status[]"
                                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <span class="ml-2 sm:text-xs text-gray-600">{{ $user_status->type }}</span>
                            </label>
                        </div>
                    @endforeach
                    <x-input-error :messages="$errors->get('type_status')" class="mt-2"/>
                </div>
                <!-- miage  prov -->
                <div>
                    <x-input-label :value="__('Institution')"/>
                    <x-inputs.select name="name_institution">
                        @foreach($institutions as $institution)
                            <option value="{{ $institution->id }}"> {{ $institution->name }} </option>
                        @endforeach
                    </x-inputs.select>
                    <x-input-error :messages="$errors->get('name_institution')" class="mt-2"/>
                </div>
            </div>
            <div class=" items-center justify-end mt-4">
                <div class="text-sm  flex items-center">
                    <input checked id="red-checkbox" type="checkbox" value=""
                           class="w-4 h-4 text-red-600 bg-gray-100 rounded border-gray-300 focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="red-checkbox"
                           class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{__('I accept the ')}}</label>
                    <a class=" ml-1 underline hover:underline no-underline text-red-700 font-bold"
                       href="{{ route('login') }}">
                        {{ __('Terms and Conditions') }}
                    </a>
                </div>
                <div class="mt-4 text-sm relative">
                    <x-buttons.form-button name="{{ __('Register') }}"></x-buttons.form-button>
                </div>
                <div class="my-4 text-sm">
                    {{ __('Already registered?') }}
                    <a class=" ml-1 underline hover:underline no-underline text-red-700 font-bold"
                       href="{{ route('login') }}">
                        {{ __('Login here') }}
                    </a>
                </div>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
