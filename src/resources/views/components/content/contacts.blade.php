<div {{$attributes->merge(['class'])}}>
<!-- breadcrumb -->
    <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
        <x-breadcrumb content="{{__('Contacts')}}">
        </x-breadcrumb>
    </div>
    <!-- end breadcrumb -->
    <div class="pt-6 px-6">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                @if(session()->get('success_contacts'))
                    <div class="bg-green-200 rounded-lg py-5 px-6 mb-4 text-base text-green-700 mb-3">
                        {{ session()->get('success_contacts') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('contacts.save') }}">
                    <fieldset id="sensitive_data_fieldset">
                        @csrf
                        <!-- Name -->
                        <div class="mt-4">
                            <x-input-label for="name" :value="__('Name')"/>

                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" autofocus/>

                            <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                        </div>
                        <div class="mt-4">
                            <x-input-label for="last_name" :value="__('Last_name')"/>

                            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" autofocus/>

                            <x-input-error :messages="$errors->get('last_name')" class="mt-2"/>
                        </div>
                        <div class="mt-4">
                            <select class="block mt-1 w-full" name="name_pole">
                                @foreach($poles as $pole)
                                    <option value="{{ $pole->name }}"> {{ $pole->name }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4">
                            <select class="block mt-1 w-full" name="name_role">
                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}"> {{ $role->name }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-buttons.primary-button class="ml-4" type="submit">
                                {{ __('Save') }}
                            </x-buttons.primary-button>
                        </div>

                        @foreach($contacts as $contact)
                            {{$contact->name}}
                            {{$contact->last_name}}
                        @endforeach
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
