<div {{$attributes->merge(['class'=>''])}}>
    <!-- breadcrumb -->
    <div class="pt-6 px-6">
        @if(session()->get('success'))
            <div class="bg-green-200 rounded-lg py-5 px-6 mb-4 text-base text-green-700 mb-3">
                {{ session()->get('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('partners.save') }}">
            <fieldset id="sensitive_data_fieldset">
                @csrf
                <!-- Name -->
                <div class="mt-4">
                    <x-input-label for="name" :value="__('Name')"/>

                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" autofocus/>

                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                </div>
                <div class="mt-4">
                    <x-input-label for="company" :value="__('Company')"/>

                    <x-text-input id="company" class="block mt-1 w-full" type="text" name="company" autofocus/>

                    <x-input-error :messages="$errors->get('company')" class="mt-2"/>
                </div>
                <div class="mt-4">
                    <x-input-label for="path_picture" :value="__('Path_picture')"/>

                    <x-text-input id="path_picture" class="block mt-1 w-full" type="text" name="path_picture" autofocus/>

                    <x-input-error :messages="$errors->get('path_picture')" class="mt-2"/>
                </div>
                <div class="flex items-center justify-end mt-4">
                    <x-buttons.primary-button class="ml-4" type="submit">
                        {{ __('Save') }}
                    </x-buttons.primary-button>
                </div>
            </fieldset>
        </form>
        @foreach($partners as $partners)
            {{$partners->name}}
            {{$partners->company}}
            {{$partners->path_picture}}
        @endforeach
    </div>
    <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
        <x-breadcrumb content="{{__('Partners')}}">
        </x-breadcrumb>
    </div>
    <!-- end breadcrumb -->
</div>
