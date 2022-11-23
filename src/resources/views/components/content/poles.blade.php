<div {{$attributes->merge(['class'])}}>
    <!-- breadcrumb -->
    <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
        <x-breadcrumb content="{{__('Poles')}}">
        </x-breadcrumb>
    </div>
    <!-- end breadcrumb -->

    <div class="pt-6 px-6">

        @if(session()->get('success_poles'))
            <div class="bg-green-200 rounded-lg py-5 px-6 mb-4 text-base text-green-700 mb-3">
                {{ session()->get('success_poles') }}
            </div>
        @endif
        <form method="POST" action="{{ route('poles.save') }}">
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
        @foreach($poles as $pole)

            <div>
                {{$pole->name}}
            </div>
            <div>
                {{$pole->created_at}}
            </div>
            <div>
                {{$pole->updated_at}}
            </div>
        @endforeach
    </div>


</div>
