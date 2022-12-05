<div {{$attributes->merge(['class'=>''])}}>
    <!-- breadcrumb -->
    <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
        <x-breadcrumb content="{{__('Tournaments')}}">
        </x-breadcrumb>
    </div>
    <!-- end breadcrumb -->
    <div class="md:pt-6 md:px-6">
        <x-cards.card>
            <div class="p-6">
                @if(session()->get('success_tournaments'))
                    <div class="bg-green-200 rounded-lg py-5 px-6 mb-4 text-base text-green-700 mb-3">
                        {{ session()->get('success_tournaments') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('tournaments.save') }}">
                    <fieldset id="sensitive_data_fieldset">
                        @csrf
                        <!-- Name -->
                        <div class="mt-4">
                            <x-input-label for="name" :value="__('Name')"/>

                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" autofocus/>

                            <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                        </div>
                        <div class="mt-4">
                            <x-input-label for="desc" :value="__('Desc')"/>

                            <x-text-input id="desc" class="block mt-1 w-full" type="text" name="desc" autofocus/>

                            <x-input-error :messages="$errors->get('desc')" class="mt-2"/>
                        </div>
                        <div class="mt-4">
                            <x-input-label for="date" :value="__('Date')"/>

                            <x-text-input id="date" class="block mt-1 w-full" type="date" name="date" autofocus/>

                            <x-input-error :messages="$errors->get('date')" class="mt-2"/>
                        </div>
                        <div class="mt-4">
                            <x-input-label for="date_end_upload" :value="__('Date end upload')"/>

                            <x-text-input id="date_end_upload" class="block mt-1 w-full" type="date" name="date_end_upload" autofocus/>

                            <x-input-error :messages="$errors->get('date_end_upload')" class="mt-2"/>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-buttons.primary-button class="ml-4" type="submit">
                                {{ __('Save') }}
                            </x-buttons.primary-button>
                        </div>
                    </fieldset>
                </form>
                @foreach($tournaments as $tournament)
                    <x-cards.input>
                        {{$tournament->name}}
                        {{$tournament->date}}
                        {{$tournament->date_end_upload}}
                        {{$tournament->desc}}
                        <form method="POST" action="{{ route('tournaments.destroy') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{$tournament->id}}">
                            <x-buttons.delete-button type="submit">
                                {{ __('Delete') }}
                            </x-buttons.delete-button>
                        </form>
                    </x-cards.input>
                @endforeach
            </div>
        </x-cards.card>
    </div>
    <x-cards.input>
        <x-table.tournaments>
            @foreach($tournaments as $tournament)
                <x-items.tournament :tournament="$tournament">
                </x-items.tournament>
            @endforeach
        </x-table.tournaments>
    </x-cards.input>
</div>
