<div {{$attributes->merge(['class'=>''])}}>
    <!-- breadcrumb -->
    <div class="p-4 bg-white dark:bg-gray-700 block sm:flex items-center justify-between">
        <x-breadcrumb content="{{__('Allotments')}}">
        </x-breadcrumb>
    </div>
    <!-- end breadcrumb -->
    <x-cards.input>
        @if(session()->get('success_allotment'))
            <x-input-success :messages="session()->get('success_allotment')" class="mt-2"/>
        @elseif(session()->get('error_allotments'))
            <x-input-error :messages="session()->get('error_allotment')" class="mt-2"/>
        @endif

            <form method="POST" action="{{ route('allotments.save') }}" enctype="multipart/form-data">
                <x-cards.fieldset>
                    @csrf
                    <!-- Name -->
                    <div>
                        <x-input-label for="allotment_name" :value="__('Name')"/>
                        <x-text-input id="allotment_name" class="block mt-1 w-full" type="text" name="allotment_name" autofocus required/>
                        <x-input-error :messages="$errors->get('allotment_name')" class="mt-2"/>
                    </div>
                    <div>
                        <x-input-label for="allotment_address" :value="__('Address')"/>
                        <x-text-input id="allotment_address" class="block mt-1 w-full" type="text" name="allotment_address" autofocus required/>
                        <x-input-error :messages="$errors->get('allotment_address')" class="mt-2"/>
                    </div>
                    <div>
                        <x-input-label for="allotment_date" :value="__('Date')"/>
                        <x-text-input id="allotment_date" class="block mt-1 w-full" type="date" name="allotment_date" autofocus/>
                        <x-input-error :messages="$errors->get('allotment_date')" class="mt-2"/>
                    </div>
                    <div>
                        <x-input-label for="allotment_desc" :value="__('Desc')"/>
                        <x-text-input id="allotment_desc" class="block mt-1 w-full" type="text" name="allotment_desc" autofocus/>
                        <x-input-error :messages="$errors->get('allotment_desc')" class="mt-2"/>
                    </div>
                    <div class="mt-4">
                        <x-input-label for="allotment_picture" :value="__('Picture')"/>
                        <x-inputs.dropzone id="allotment_picture" class="block mt-1 w-full" type="file" name="allotment_picture" autofocus/>
                        <x-input-error :messages="$errors->get('allotment_picture')" class="mt-2"/>
                    </div>
                </x-cards.fieldset>
                <div class="flex items-center justify-end mt-4">
                    <x-buttons.form-button name="{{ __('Save') }}"></x-buttons.form-button>
                </div>
            </form>
    </x-cards.input>
    <x-cards.table class="md:mb-6">
        <x-table.allotments>
            @forelse($allotments as $allotment)
                    <x-items.allotment :allotment="$allotment">
                    </x-items.allotment>
            @empty
                <div class="mx-4 my-1 text-gray-900 dark:text-white">
                    {{__('No')}} {{__('Allotments')}}...
                </div>
            @endforelse
        </x-table.allotments>
    </x-cards.table>
</div>
