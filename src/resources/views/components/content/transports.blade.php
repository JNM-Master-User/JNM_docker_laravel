<div {{$attributes->merge(['class'=>''])}}>
    <!-- breadcrumb -->
    <div class="p-4 bg-white dark:bg-gray-700 block sm:flex items-center justify-between lg:mt-1.5">
        <x-breadcrumb content="{{__('Transports')}}">
        </x-breadcrumb>
    </div>
    <!-- end breadcrumb -->
    <x-cards.input>
        @if(session()->get('success_transports'))
            <x-input-success :messages="session()->get('success_transports')" class="mt-2"/>
        @elseif(session()->get('error_transports'))
            <x-input-error :messages="session()->get('error_transports')" class="mt-2"/>
        @endif
        <form method="POST" action="{{ route('transports.save') }}" enctype="multipart/form-data">
            <x-cards.fieldset>
                @csrf
                <div class="mt-4">
                    <x-input-label for="picture" :value="__('Picture')"/>
                    <x-inputs.dropzone id="picture" class="block mt-1 w-full" type="file" name="picture" autofocus/>
                    <x-input-error :messages="$errors->get('picture')" class="mt-2"/>
                </div>
                <div class="mt-4">
                    <x-input-label for="name" :value="__('Name')"/>
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" autofocus/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                    <div class="flex items-center justify-end mt-4">
                        <x-buttons.form-button name="{{ __('Save') }}"></x-buttons.form-button>
                    </div>
                </div>
            </x-cards.fieldset>
        </form>
    </x-cards.input>
    <x-cards.input>
        <x-table.transports>
            @foreach($transports as $transport)
                <x-items.transport :transport="$transport">
                </x-items.transport>
            @endforeach
        </x-table.transports>
    </x-cards.input>
</div>
