<div {{$attributes->merge(['class'=>''])}}>
    <!-- breadcrumb -->
    <div class="p-4 bg-white dark:bg-gray-700 block sm:flex items-center justify-between">
        <x-breadcrumb content="{{__('Events')}}">
        </x-breadcrumb>
    </div>
    <!-- end breadcrumb -->
    <x-cards.input>
        @if(session()->get('success_events'))
            <x-input-success :messages="session()->get('success_events')" class="mt-2"/>
        @elseif(session()->get('error_events'))
            <x-input-error :messages="session()->get('error_events')" class="mt-2"/>
        @endif
        <form method="POST" action="{{ route('events.save') }}">
            <x-cards.fieldset>
            @csrf
                <div>
                    <x-input-label for="name" :value="__('Name Event')"/>
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" autofocus/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                </div>
                <div>
                    <x-input-label for="address" :value="__('Address')"/>
                    <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" autofocus/>
                    <x-input-error :messages="$errors->get('address')" class="mt-2"/>
                </div>
                <div>
                    <x-input-label for="date" :value="__('Date')"/>
                    <x-text-input id="date" class="block mt-1 w-full" type="date" name="date" autofocus/>
                    <x-input-error :messages="$errors->get('date')" class="mt-2"/>
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
                <div>
                    <x-input-label  :value="__('Institutions')"/>
                    <x-inputs.select class="block mt-1 w-full" name="name_institution" >
                        @foreach($institutions as $institution)
                            <option value="{{ $institution->id }}"> {{ $institution->name }} </option>
                        @endforeach
                    </x-inputs.select>
                </div>
                <div>
                    <x-input-label :value="__('Events')"/>
                    <x-inputs.select class="block mt-1 w-full" name="name_event_belong">
                        @foreach($events as $event)
                            <option value="{{ $event->id }}"> {{ $event->name }} </option>
                        @endforeach
                    </x-inputs.select>
                </div>
                <div class="flex items-center justify-end mt-4">
                    <x-buttons.form-button name="{{ __('Save') }}"></x-buttons.form-button>
                </div>
            </x-cards.fieldset>
        </form>
    </x-cards.input>
    <x-cards.table>
        <x-table.events>
            @forelse($events as $event)
                <x-items.event :event="$event">
                </x-items.event>
            @empty
                <div class="mx-4 my-1 text-gray-900 dark:text-white">
                    {{__('No')}} {{__('Events')}}...
                </div>
            @endforelse
        </x-table.events>
    </x-cards.table>
</div>

