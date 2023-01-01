<div {{$attributes->merge(['class'=>''])}}>
    <!-- breadcrumb -->
    <div class="p-4 bg-white dark:bg-gray-700 block sm:flex items-center justify-between">
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
                    <x-inputs.select name="name_pole" >
                        @foreach($poles as $pole)
                            <option value="{{ $pole->id }}"> {{ $pole->name }} </option>
                        @endforeach
                    </x-inputs.select>
                </div>
                <div>
                    <x-input-label :value="__('Roles')"/>
                    <x-inputs.select name="name_role">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}"> {{ $role->name }} </option>
                        @endforeach
                    </x-inputs.select>
                </div>
            </x-cards.fieldset>
            <div class="flex items-center justify-end mt-4">
                <x-buttons.form-button name="{{ __('Save') }}"></x-buttons.form-button>
            </div>
        </form>
    </x-cards.input>
    <x-cards.table>
        <x-table.contacts>
            @forelse($contacts as $contact)
            <x-items.contacts :contact="$contact">
            </x-items.contacts>
            @empty
                <div class="mx-4 my-1 text-gray-900 dark:text-white">
                    {{__('No')}} {{__('Contacts')}}...
                </div>
            @endforelse
        </x-table.contacts>
    </x-cards.table>
</div>
