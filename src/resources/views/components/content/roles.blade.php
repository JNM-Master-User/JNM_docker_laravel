<div {{$attributes->merge(['class'=>''])}}>
    <!-- breadcrumb -->
    <div class="p-4 bg-white dark:bg-gray-700 block sm:flex items-center justify-between">
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
                            <x-buttons.form-button name="{{ __('Save') }}"></x-buttons.form-button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </x-cards.card>
    </div>
    <x-cards.table>
        <x-table.roles>
            @forelse($roles as $role)
                <x-items.role :role="$role">
                </x-items.role>
            @empty
                <div class="mx-4 my-1 text-gray-900 dark:text-white">
                    {{__('No')}} {{__('Roles')}}...
                </div>
            @endforelse
        </x-table.roles>
    </x-cards.table>
</div>
