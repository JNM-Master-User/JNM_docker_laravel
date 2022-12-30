<div {{$attributes->merge(['class'=>''])}}>
    <!-- breadcrumb -->
    <div class="p-4 bg-white dark:bg-gray-700 block sm:flex items-center justify-between lg:mt-1.5">
        <x-breadcrumb content="{{__('Poles')}}">
        </x-breadcrumb>
    </div>
    <!-- end breadcrumb -->
    <x-cards.input>
        @if(session()->get('success_poles'))
            <x-input-success :messages="session()->get('success_poles')" class="mt-2"/>
        @elseif(session()->get('error_poles'))
            <x-input-error :messages="session()->get('error_poles')" class="mt-2"/>
        @endif
        <form method="POST" action="{{ route('poles.save') }}">
            <x-cards.fieldset>
                @csrf
                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')"/>
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" autofocus/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                </div>
                <div class="flex items-center justify-end mt-4">
                    <x-buttons.form-button name="{{ __('Save') }}"></x-buttons.form-button>
                </div>
            </x-cards.fieldset>
        </form>
    </x-cards.input>
    <x-cards.input>
        <x-table.poles>
            @foreach($poles as $pole)
                <x-items.pole :pole="$pole">
                </x-items.pole>
            @endforeach
        </x-table.poles>
    </x-cards.input>
</div>
