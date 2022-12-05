<div {{$attributes->merge(['class'=>''])}}>
<!-- breadcrumb -->
    <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
        <x-breadcrumb content="{{__('Users_status')}}">
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
                <!-- Name -->
                <div class="mt-4">
                    <x-input-label for="type" :value="__('Type')"/>

                    <x-text-input id="type" class="block mt-1 w-full" type="text" name="type" autofocus/>

                    <x-input-error :messages="$errors->get('type')" class="mt-2"/>
                </div>
                <div class="flex items-center justify-end mt-4">
                    <x-buttons.primary-button class="ml-4" type="submit">
                        {{ __('Save') }}
                    </x-buttons.primary-button>
                </div>
            </x-cards.fieldset>
        </form>
    </x-cards.input>

    <x-cards.input>
        <x-table.users_status>
            @foreach($usersStatus as $user_status)
                <x-items.users_status :userStatus="$user_status">
                </x-items.users_status>
            @endforeach
        </x-table.users_status>
    </x-cards.input>
</div>
