<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('roles') }}
        </h2>
    </x-slot>

    <div class="pt-6 px-6">
        @if(session()->get('success'))
            <div class="bg-green-200 rounded-lg py-5 px-6 mb-4 text-base text-green-700 mb-3">
                {{ session()->get('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('roles') }}">
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
            </fieldset>
        </form>
        @foreach ($roles as $role)
            <div>
                {{$role->name}}
            </div>
            <div>
                {{$role->created_at}}
            </div>
            <div>
                {{$role->created_by}}
            </div>
        @endforeach
    </div>
</x-app-layout>