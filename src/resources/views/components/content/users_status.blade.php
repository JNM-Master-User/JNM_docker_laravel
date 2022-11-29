<div {{$attributes->merge(['class'=>''])}}>
<!-- breadcrumb -->
    <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
        <x-breadcrumb content="{{__('Users status')}}">
        </x-breadcrumb>
    </div>
    <!-- end breadcrumb -->
    <x-cards.input>
        @if(session()->get('success_users_status'))
            <div class="bg-green-200 rounded-lg py-5 px-6 mb-4 text-base text-green-700 mb-3">
                {{ session()->get('success_users_status') }}
            </div>
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
    @foreach($usersStatus as $user_status)
        <x-cards.input>
            <div>
                {{$user_status->type}}
            </div>
            <form method="POST" action="{{ route('users_status.destroy') }}">
                @csrf
                <input type="hidden" name="id" value="{{$user_status->id}}">
                <x-buttons.delete-button type="submit">
                    {{ __('Delete') }}
                </x-buttons.delete-button>
            </form>
        </x-cards.input>
    @endforeach
</div>
