<div {{$attributes->merge(['class'=>''])}}>
    <!-- breadcrumb -->
    <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
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
                    <select class="block mt-1 w-full" name="name_institution" >
                        @foreach($institutions as $institution)
                            <option value="{{ $institution->id }}"> {{ $institution->name }} </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <x-input-label :value="__('Events')"/>
                    <select class="block mt-1 w-full" name="name_event_belong">
                        @foreach($events as $event)
                            <option value="{{ $event->id }}"> {{ $event->name }} </option>
                        @endforeach
                    </select>
                </div>
            </x-cards.fieldset>
            <div class="flex items-center justify-end">
                <x-buttons.primary-button class="ml-4" type="submit">
                    {{ __('Save') }}
                </x-buttons.primary-button>
            </div>
        </form>
    </x-cards.input>

    <x-cards.input>
        <x-table.events>
            @foreach($events as $event)
                <x-items.events :event="$event">
                </x-items.events>
            @endforeach
        </x-table.events>
    </x-cards.input>
</div>

