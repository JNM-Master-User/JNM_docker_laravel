<div {{$attributes->merge(['class'=>''])}}>
    <!-- breadcrumb -->
    <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
        <x-breadcrumb content="{{__('Roles')}}">
        </x-breadcrumb>
    </div>
    <!-- end breadcrumb -->
    <div class="md:pt-6 md:px-6">
        <x-cards.card>
            <div class="p-6">
                @if(session()->get('success_roles'))
                    <x-input-success :messages="session()->get('success_roles')" class="mt-2"/>
                @elseif(session()->get('error_roles'))
                    <x-input-error :messages="session()->get('error_roles')" class="mt-2"/>
                @endif
                <form method="POST" action="{{ route('roles.save') }}">
                    <fieldset id="sensitive_data_fieldset">
                        @csrf
                        <!-- Name -->
                        <div class="mt-4">
                            <x-input-label for="name" :value="__('Name')"/>
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" autofocus/>
                            <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-buttons.primary-button class="ml-4" type="submit">
                                {{ __('Save') }}
                            </x-buttons.primary-button>
                        </div>
                        @foreach($roles as $role)
                            {{$role->name}}
                        @endforeach
                    </fieldset>
                </form>
            </div>
        </x-cards.card>
    </div>
    <x-cards.input>
        <x-table.roles>
            @foreach($roles as $role)
                <x-items.role :role="$role">
                </x-items.role>
            @endforeach
        </x-table.roles>
    </x-cards.input>
</div>
