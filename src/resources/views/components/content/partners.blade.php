<div {{$attributes->merge(['class'=>''])}}>
    <!-- breadcrumb -->
    <div class="p-4 bg-white dark:bg-gray-700 block sm:flex items-center justify-between lg:mt-1.5">
        <x-breadcrumb content="{{__('Partners')}}">
        </x-breadcrumb>
    </div>
    <!-- end breadcrumb -->
    <x-cards.input>
        @if(session()->get('success_partners'))
            <x-input-success :messages="session()->get('success_partners')" class="mt-2"/>
        @elseif(session()->get('error_partners'))
            <x-input-error :messages="session()->get('error_partners')" class="mt-2"/>
        @endif
        <form method="POST" action="{{ route('partners.save') }}">
            <x-cards.fieldset>
                @csrf
                <div>
                    <x-input-label for="name" :value="__('Name')"/>
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" autofocus/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                </div>
                <div>
                    <x-input-label for="company" :value="__('Company')"/>
                    <x-text-input id="company" class="block mt-1 w-full" type="text" name="company" autofocus/>
                    <x-input-error :messages="$errors->get('company')" class="mt-2"/>
                </div>
                <div>
                    <x-input-label for="path_picture" :value="__('Path_picture')"/>
                    <x-text-input id="path_picture" class="block mt-1 w-full" type="text" name="path_picture" autofocus/>
                    <x-input-error :messages="$errors->get('path_picture')" class="mt-2"/>
                </div>
                <div class="flex items-center justify-end mt-4">
                    <x-buttons.form-button name="{{ __('Save') }}"></x-buttons.form-button>
                </div>
            </x-cards.fieldset>
        </form>
    </x-cards.input>
    <x-cards.input>
        <x-table.partners>
            @foreach($partners as $partner)
                <x-items.partner :partner="$partner">
                </x-items.partner>
            @endforeach
        </x-table.partners>
    </x-cards.input>
</div>