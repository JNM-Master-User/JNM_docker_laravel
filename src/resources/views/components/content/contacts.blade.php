<div {{$attributes->merge(['class'=>''])}}>
    <!-- breadcrumb -->
    <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
        <x-breadcrumb content="{{__('Contacts')}}">
        </x-breadcrumb>
    </div>
    <!-- end breadcrumb -->
    <x-cards.input>
        @if(session()->get('success_contacts'))
            <x-input-success :messages="session()->get('success_contacts')" class="mt-2"/>
        @elseif(session()->get('error_contacts'))
            <x-input-error :messages="session()->get('error_contacts')" class="mt-2"/>
        @endif
        <form method="POST" action="{{ route('contacts.save') }}">
            <x-cards.fieldset>
                @csrf
                <div>
                    <x-input-label for="name" :value="__('Name')"/>
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" autofocus required/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                </div>
                <div>
                    <x-input-label for="last_name" :value="__('Last name')"/>
                    <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" autofocus required/>
                    <x-input-error :messages="$errors->get('last_name')" class="mt-2"/>
                </div>
                <div>
                    <x-input-label  :value="__('Poles')"/>
                    <x-select name="name_pole" >
                        @foreach($poles as $pole)
                            <option value="{{ $pole->id }}"> {{ $pole->name }} </option>
                        @endforeach
                    </x-select>
                </div>
                <div>
                    <x-input-label :value="__('Roles')"/>
                    <x-select name="name_role">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}"> {{ $role->name }} </option>
                        @endforeach
                    </x-select>
                </div>
            </x-cards.fieldset>
            <div class="flex items-center justify-end mt-4">
                <x-buttons.primary-button class="ml-4" type="submit">
                    {{ __('Save') }}
                </x-buttons.primary-button>
            </div>
        </form>
    </x-cards.input>
    <x-table.contacts>
        @foreach($contacts as $contact)
            <x-items.contacts :contact="$contact">
            </x-items.contacts>
        @endforeach
    </x-table.contacts>
</div>
