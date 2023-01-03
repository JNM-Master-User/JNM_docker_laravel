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

            <form method="POST" action="{{ route('allotments.save') }}">
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
                        <x-input-label for="allotment_zip_code" :value="__('Zip_code')"/>
                        <x-text-input id="allotment_zip_code" class="block mt-1 w-full" type="text" name="allotment_zip_code" autofocus required/>
                        <x-input-error :messages="$errors->get('allotment_zip_code')" class="mt-2"/>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <x-buttons.form-button name="{{ __('Save') }}"></x-buttons.form-button>
                    </div>
                </x-cards.fieldset>
            </form>
    </x-cards.input>
    <x-cards.table>
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
