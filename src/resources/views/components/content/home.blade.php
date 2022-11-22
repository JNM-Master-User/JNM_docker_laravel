<div {{$attributes->merge(['class'])}}>
    <!-- breadcrumb -->
        <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
            <x-breadcrumb content="{{__('Dashboard')}}">
            </x-breadcrumb>
        </div>
    <!-- end breadcrumb -->

    <div class="pt-6 px-6">
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
                    <fieldset id="sensitive_data_fieldset">
                        @csrf
                        <!-- Name -->
                        <div class="mt-4">
                            <x-input-label for="name" :value="__('Name')"/>

                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                          :value="Auth::user()->userSensitiveData->name ?? null" autofocus/>

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
                            <x-buttons.delete-button class="ml-4" href="{{ route('user-sensitive-data.destroy') }}" class="ml-4" type="button">
                                {{ __('Delete') }}
                            </x-buttons.delete-button>
                            <legend>
                                <x-buttons.success-button class="ml-4" onclick="toggleEdit(this.id)">
                                    {{ __('Edit') }}
                                </x-buttons.success-button>
                            </legend>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>