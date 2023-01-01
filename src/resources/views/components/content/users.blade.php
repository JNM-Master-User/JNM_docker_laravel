<div {{$attributes->merge(['class'=>''])}}>
    <!-- breadcrumb -->
    <div class="p-4 bg-white dark:bg-gray-700 block sm:flex items-center justify-between">
        <x-breadcrumb content="{{__('Users')}}">
        </x-breadcrumb>
    </div>
    <!-- end breadcrumb -->
    <x-cards.input>
        @if(session()->get('success_users'))
            <x-input-success :messages="session()->get('success_users')" class="mt-2"/>
        @elseif(session()->get('error_users'))
            <x-input-error :messages="session()->get('error_users')" class="mt-2"/>
        @endif
        <form method="POST" action="{{ route('users.save') }}">
            <x-cards.fieldset>
                @csrf
                <div>
                    <x-input-label for="user_email" :value="__('Email')" />
                    <x-text-input id="user_email" class="block mt-1 w-full" type="email" name="user_email" :value="old('user_email')" required />
                    <x-input-error :messages="$errors->get('user_email')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
                <div class="flex items-center justify-end mt-4">
                    <x-buttons.form-button name="{{ __('Save') }}"></x-buttons.form-button>
                </div>
            </x-cards.fieldset>
        </form>
    </x-cards.input>
    <x-cards.table>
        <x-table.users>
            @forelse($users as $user)
                <x-items.user :user="$user">
                </x-items.user>
            @empty
                <div class="mx-4 my-1 text-gray-900 dark:text-white">
                    {{__('No')}} {{__('Users')}}...
                </div>
            @endforelse
        </x-table.users>
    </x-cards.table>
</div>
