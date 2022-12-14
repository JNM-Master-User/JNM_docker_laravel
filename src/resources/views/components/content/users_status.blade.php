<div {{$attributes->merge(['class'=>''])}}>
<!-- breadcrumb -->
    <div class="p-4 bg-white dark:bg-gray-700 block sm:flex items-center justify-between">
        <x-breadcrumb content="{{__('Users status')}}">
        </x-breadcrumb>
    </div>
    <!-- end breadcrumb -->
    <x-cards.input>
        @if(session()->get('success_users_status'))
            <x-input-success :messages="session()->get('success_users_status')" class="mt-2"/>
        @elseif(session()->get('error_users_status'))
            <x-input-error :messages="session()->get('error_users_status')" class="mt-2"/>
        @endif
        <form method="POST" action="{{ route('users_status.save') }}">
            <x-cards.fieldset>
                @csrf
                <div class="mt-4">
                    <x-input-label for="type" :value="__('Type')"/>

                    <x-text-input id="type" class="block mt-1 w-full" type="text" name="type" autofocus/>

                    <x-input-error :messages="$errors->get('type')" class="mt-2"/>
                </div>
                <div class="flex items-center justify-end mt-4">
                    <x-buttons.form-button name="{{ __('Save') }}"></x-buttons.form-button>
                </div>
            </x-cards.fieldset>
        </form>
    </x-cards.input>
    <x-cards.table>
        <x-table.users_status>
            @forelse($usersStatus as $user_status)
                <x-items.user_status :userStatus="$user_status">
                </x-items.user_status>
            @empty
                <div class="mx-4 my-1 text-gray-900 dark:text-white">
                    {{__('No')}} {{__('User Status')}}...
                </div>
            @endforelse
        </x-table.users_status>
    </x-cards.table>
</div>
