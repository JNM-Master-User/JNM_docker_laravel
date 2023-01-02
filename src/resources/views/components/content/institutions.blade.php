<div {{$attributes->merge(['class'=>''])}}>
    <!-- breadcrumb -->
    <div class="p-4 bg-white dark:bg-gray-700 block sm:flex items-center justify-between border-b lg:mt-1.5">
        <x-breadcrumb content="{{__('Institutions')}}">
        </x-breadcrumb>
    </div>
    <!-- end breadcrumb -->
    <x-cards.input>
        @if(session()->get('success_institutions'))
            <x-input-success :messages="session()->get('success_institutions')" class="mt-2"/>
        @elseif(session()->get('error_institutions'))
            <x-input-error :messages="session()->get('error_institutions')" class="mt-2"/>
        @endif
        <form method="POST" action="{{ route('institutions.save') }}">
            <x-cards.fieldset>
                @csrf
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
                    <x-input-label for="path_picture" :value="__('Path_picture')"/>
                    <x-text-input id="path_picture" class="block mt-1 w-full" type="text" name="path_picture" autofocus/>
                    <x-input-error :messages="$errors->get('path_picture')" class="mt-2"/>
                </div>
                <div>
                    <x-input-label for="desc" :value="__('Desc')"/>
                    <x-text-input id="desc" class="block mt-1 w-full" type="text" name="desc" autofocus/>
                    <x-input-error :messages="$errors->get('desc')" class="mt-2"/>
                </div>
            </x-cards.fieldset>
            <div class="flex items-center justify-end mt-4">
                <x-buttons.form-button name="{{ __('Save') }}"></x-buttons.form-button>
            </div>
        </form>
    </x-cards.input>
    <x-cards.input>
        <x-table.institutions>
            @foreach($institutions as $institution)
                <x-items.institution :institution="$institution">
                </x-items.institution>
            @endforeach
        </x-table.institutions>
    </x-cards.input>
</div>


