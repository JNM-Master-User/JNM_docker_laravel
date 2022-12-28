<div {{$attributes->merge(['class'=>''])}}>
    <!-- breadcrumb -->
    <div class="p-4 bg-white dark:bg-gray-700 block sm:flex items-center justify-between lg:mt-1.5">
        <x-breadcrumb content="{{__('Allotments')}}">
        </x-breadcrumb>
    </div>
    <!-- end breadcrumb -->
    <x-cards.input>
        @if(session()->get('success_allotments'))
            <x-input-success :messages="session()->get('success_allotments')" class="mt-2"/>
        @elseif(session()->get('error_allotments'))
            <x-input-error :messages="session()->get('error_allotments')" class="mt-2"/>
        @endif
            <form method="POST" action="{{ route('allotments.save') }}">
                <x-cards.fieldset>
                    @csrf
                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')"/>
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" autofocus/>
                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                    </div>
                    <div>
                        <x-input-label for="address" :value="__('Address')"/>
                        <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" autofocus/>
                        <x-input-error :messages="$errors->get('address')" class="mt-2"/>
                    </div>
                    <div>
                        <x-input-label for="zip_code" :value="__('Zip_code')"/>
                        <x-text-input id="zip_code" class="block mt-1 w-full" type="text" name="zip_code" autofocus/>
                        <x-input-error :messages="$errors->get('zip_code')" class="mt-2"/>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <x-buttons.form-button name="{{ __('Save') }}"></x-buttons.form-button>
                    </div>
                </x-cards.fieldset>
            </form>
    </x-cards.input>
    <x-cards.input>
        <x-table.allotments>
            @foreach($allotments as $allotment)
                    <x-items.allotment :allotment="$allotment">
                    </x-items.allotment>
            @endforeach
        </x-table.allotments>
    </x-cards.input>
</div>
