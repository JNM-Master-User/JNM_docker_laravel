<div {{$attributes->merge(['class'=>''])}}>
    <!-- breadcrumb -->
    <div class="p-4 bg-white dark:bg-gray-700 block sm:flex items-center justify-between">
        <x-breadcrumb content="{{__('Tournaments')}}">
        </x-breadcrumb>
    </div>
    <!-- end breadcrumb -->
    <x-cards.input>
        @if(session()->get('success_tournaments'))
            <x-input-success :messages="session()->get('success_tournaments')" class="mt-2"/>
        @elseif(session()->get('error_tournaments'))
            <x-input-error :messages="session()->get('error_tournaments')" class="mt-2"/>
        @endif
        <form method="POST" action="{{ route('tournaments.save') }}">
            <x-cards.fieldset>
                @csrf
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
                <div>
                    <x-input-label for="date" :value="__('Date')"/>
                    <x-text-input id="date" class="block mt-1 w-full" type="date" name="date" autofocus/>
                    <x-input-error :messages="$errors->get('date')" class="mt-2"/>
                </div>
                <div>
                    <x-input-label for="date_end_upload" :value="__('Date end upload')"/>
                    <x-text-input id="date_end_upload" class="block mt-1 w-full" type="date" name="date_end_upload" autofocus/>
                    <x-input-error :messages="$errors->get('date_end_upload')" class="mt-2"/>
                </div>
            </x-cards.fieldset>
            <div class="flex items-center justify-end mt-4">
                <x-buttons.form-button name="{{ __('Save') }}"></x-buttons.form-button>
            </div>
        </form>
    </x-cards.input>
    <x-cards.table>
        <x-table.tournaments>
            @forelse($tournaments as $tournament)
                <x-items.tournament :tournament="$tournament">
                </x-items.tournament>
            @empty
                <div class="mx-4 my-1 text-gray-900 dark:text-white">
                    {{__('No')}} {{__('Tournaments')}}...
                </div>
            @endforelse
        </x-table.tournaments>
    </x-cards.table>
</div>



