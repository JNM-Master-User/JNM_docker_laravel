<div {{$attributes->merge(['class'=>''])}}>
    <!-- breadcrumb -->
    <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
        <x-breadcrumb content="{{__('Services')}}">
        </x-breadcrumb>
    </div>
    <!-- end breadcrumb -->
    <x-cards.input>
        @if(session()->get('success_services'))
            <x-input-success :messages="session()->get('success_services')" class="mt-2"/>
        @elseif(session()->get('error_services'))
            <x-input-error :messages="session()->get('error_services')" class="mt-2"/>
        @endif
        <form method="POST" action="{{ route('services.save') }}">
            <x-cards.fieldset>
                @csrf
                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')"/>
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" autofocus/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                </div>
                <div>
                    <x-input-label for="desc" :value="__('Desc')"/>
                    <x-text-input id="desc" class="block mt-1 w-full" type="text" name="desc" autofocus/>
                    <x-input-error :messages="$errors->get('desc')" class="mt-2"/>
                </div>
            </x-cards.fieldset>
            <div class="flex items-center justify-end mt-4">
                <x-buttons.primary-button class="ml-4" type="submit">
                    {{ __('Save') }}
                </x-buttons.primary-button>
            </div>
        </form>
    </x-cards.input>
    <x-cards.input>
        <x-table.services>
            @foreach($services as $service)
                <x-items.service :service="$service">
                </x-items.service>
            @endforeach
        </x-table.services>
    </x-cards.input>
</div>

