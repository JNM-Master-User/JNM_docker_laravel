<div {{$attributes->merge(['class'=>''])}}>
    <!-- breadcrumb -->
    <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
        <x-breadcrumb content="{{__('Allotments')}}">
        </x-breadcrumb>
    </div>
    <!-- end breadcrumb -->
    <div class="md:pt-6 md:px-6">
        <x-cards.card>
            <div class="p-6">
                @if(session()->get('success_allotments'))
                    <div class="bg-green-200 rounded-lg py-5 px-6 mb-4 text-base text-green-700 mb-3">
                        {{ session()->get('success_allotments') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('allotments.save') }}">
                    <fieldset id="sensitive_data_fieldset">
                        @csrf
                        <!-- Name -->
                        <div class="mt-4">
                            <x-input-label for="name" :value="__('Name')"/>

                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" autofocus/>

                            <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                        </div>
                        <div class="mt-4">
                            <x-input-label for="address" :value="__('Address')"/>

                            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" autofocus/>

                            <x-input-error :messages="$errors->get('address')" class="mt-2"/>
                        </div>
                        <div class="mt-4">
                            <x-input-label for="zip_code" :value="__('Zip_code')"/>

                            <x-text-input id="zip_code" class="block mt-1 w-full" type="text" name="zip_code" autofocus/>

                            <x-input-error :messages="$errors->get('zip_code')" class="mt-2"/>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-buttons.primary-button class="ml-4" type="submit">
                                {{ __('Save') }}
                            </x-buttons.primary-button>
                        </div>
                    </fieldset>
                </form>
                @foreach($allotments as $allotment)
                    {{$allotment->name}}
                    {{$allotment->address}}
                    {{$allotment->zip_code}}
                @endforeach
            </div>
        </x-cards.card>
    </div>
</div>
