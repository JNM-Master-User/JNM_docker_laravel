<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{ __("You're logged in!") }}
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(session()->get('success'))
                        <div class="bg-green-200 rounded-lg py-5 px-6 mb-4 text-base text-green-700 mb-3">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('user-sensitive-data.save') }}">
                        @csrf
                        <!-- Name -->
                        <div class="mt-4">
                            <x-input-label for="name" :value="__('Name')"/>

                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                          :value="old('name', Auth::user()->userSensitiveData->name ?? null)" autofocus/>

                            <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                        </div>

                        <!-- Last Name -->
                        <div class="mt-4">
                            <x-input-label for="last_name" :value="__('Last Name')"/>

                            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                                          :value="old('last_name', Auth::user()->userSensitiveData->last_name ?? null)" autofocus/>

                            <x-input-error :messages="$errors->get('last_name')" class="mt-2"/>
                        </div>

                        <!-- Date of Birth -->
                        <div class="mt-4">
                            <x-input-label for="date_of_birth" :value="__('Date of birth')"/>

                            <x-text-input id="date_of_birth" class="block mt-1 w-full" type="date" name="date_of_birth"
                                          :value="old('date_of_birth', Auth::user()->userSensitiveData->date_of_birth ?? null)"/>

                            <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2"/>
                        </div>

                        <!-- Phone number -->
                        <div class="mt-4">
                            <x-input-label for="phone_number" :value="__('Phone number')"/>

                            <x-text-input id="phone_number" class="block mt-1 w-full" type="tel" name="phone_number"
                                          :value="old('phone_number', Auth::user()->userSensitiveData->phone_number ?? null)"/>

                            <x-input-error :messages="$errors->get('phone_number')" class="mt-2"/>
                        </div>

                        <!-- Address -->
                        <div class="mt-4">
                            <x-input-label for="address" :value="__('Address')"/>

                            <x-text-input id="address" class="block mt-1 w-full" type="tel" name="address"
                                          :value="old('address', Auth::user()->userSensitiveData->address ?? null)" />

                            <x-input-error :messages="$errors->get('address')" class="mt-2"/>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-buttons.primary-button class="ml-4">
                                {{ __('Save') }}
                            </x-buttons.primary-button>
                            <x-buttons.delete-button href="{{ route('user-sensitive-data.destroy') }}" class="ml-4" type="button">
                                {{ __('Delete') }}
                            </x-buttons.delete-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
