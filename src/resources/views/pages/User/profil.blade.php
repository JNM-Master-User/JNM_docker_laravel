<x-app-public-layout>
    <div class="p-4 bg-white dark:bg-gray-700 block sm:flex items-center justify-between">
        <x-breadcrumb content="{{__('Profil')}}">
        </x-breadcrumb>
    </div>
    <x-cards.input>
        <div class="p-6 border-gray-200">
            @if(session()->get('success_user-sensitive-data'))
                <x-input-success :messages="session()->get('success_user-sensitive-data')" class="mt-2"/>
            @elseif(session()->get('error_user-sensitive-data'))
                <x-input-error :messages="session()->get('error_user-sensitive-data')" class="mt-2"/>
            @endif
            <form method="POST" action="{{ route('user-sensitive-data.save') }}">
                <x-cards.fieldset>
                    @csrf
                    <!-- Name -->
                    <div class="mt-4">
                        <x-input-label for="name" :value="__('Name')"/>
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="Auth::user()->userSensitiveData->name ?? null" autofocus/>
                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                    </div>
                    <!-- Last Name -->
                    <div class="mt-4">
                        <x-input-label for="last_name" :value="__('Last Name')"/>
                        <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name', Auth::user()->userSensitiveData->last_name ?? null)" autofocus/>
                        <x-input-error :messages="$errors->get('last_name')" class="mt-2"/>
                    </div>
                    <!-- Date of Birth -->
                    <div class="mt-4">
                        <x-input-label for="date_of_birth" :value="__('Date of birth')"/>
                        <x-text-input id="date_of_birth" class="block mt-1 w-full" type="date" name="date_of_birth" :value="old('date_of_birth', Auth::user()->userSensitiveData->date_of_birth ?? null)"/>
                        <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2"/>
                    </div>
                    <!-- Phone number -->
                    <div class="mt-4">
                        <x-input-label for="phone_number" :value="__('Phone number')"/>
                        <x-text-input id="phone_number" class="block mt-1 w-full" type="tel" name="phone_number" :value="old('phone_number', Auth::user()->userSensitiveData->phone_number ?? null)"/>
                        <x-input-error :messages="$errors->get('phone_number')" class="mt-2"/>
                    </div>
                    <!-- Address -->
                    <div class="mt-4">
                        <x-input-label for="address" :value="__('Address')"/>
                        <x-text-input id="address" class="block mt-1 w-full" type="tel" name="address" :value="old('address', Auth::user()->userSensitiveData->address ?? null)"/>
                        <x-input-error :messages="$errors->get('address')" class="mt-2"/>
                    </div>
                    <div class="mt-4">
                        <x-input-label for="zip_code" :value="__('Zip code')"/>
                        <x-text-input id="zip_code" class="block mt-1 w-full" type="text" name="zip_code" :value="old('zip_code', Auth::user()->userSensitiveData->zip_code ?? null)"/>
                        <x-input-error :messages="$errors->get('zip_code')" class="mt-2"/>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <x-buttons.form-button name="{{ __('Save') }}"></x-buttons.form-button>
                    </div>
                </x-cards.fieldset>
            </form>
        </div>
    </x-cards.input>
    <x-cards.input>
        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">{{__('My Bookings')}}</h5>
        @if(session()->get('success_profil'))
            <x-input-success :messages="session()->get('success_profil')" class="mt-2"/>
        @elseif(session()->get('error_profil'))
            <x-input-error :messages="session()->get('error_profil')" class="mt-2"/>
        @endif
    </x-cards.input>
    <x-cards.input>
        <x-cards.title icon="fa-bed" title="{{__('Events')}}" desc="{!!__('Events desc')!!}">
            <x-slot name="icon">
                <x-icons.events class="fa-2xl mb-10"></x-icons.events>
            </x-slot>
        </x-cards.title>
        @forelse($bookings_users_events as $booking_user_event)
            <x-cards.booking img="{{asset('storage/events/'.$booking_user_event->event->path_picture)}}"
                             name="{{$booking_user_event->event->name}}"
                             address="{{$booking_user_event->event->address}}"
                             date="{{$booking_user_event->event->date->format('d-m-Y')}}">
                <div class="flex justify-end">
                    <form method="POST" action="{{ route('booking.user.event.destroy') }}">
                        @csrf
                        <input type="hidden" name="booking_user_event_id" value="{{$booking_user_event->id}}">
                        <x-buttons.form-button name="{{__('Cancel')}} {{__('Booking')}} {{__('Event')}}"><i
                                    class="mr-2 fa-lg fa-fw fa-solid fa-ban"></i></x-buttons.form-button>
                    </form>
                </div>
            </x-cards.booking>
        @empty
            <div class="mx-4 my-1 text-gray-900 dark:text-white">
                {{__('No')}} {{__('Events')}} {{__('Booked')}}...
            </div>
        @endforelse
    </x-cards.input>
    <x-cards.input class="md:mb-6">
        <x-cards.title icon="fa-bed" title="{{__('Allotments')}}" desc="{!!__('Allotments desc')!!}">
            <x-slot name="icon">
                <x-icons.allotments class="fa-2xl mb-10"></x-icons.allotments>
            </x-slot>
        </x-cards.title>
        @forelse($bookings_users_allotments as $booking_user_allotment)
            <x-cards.booking img="{{asset('storage/allotments/'.$booking_user_allotment->allotment->path_picture)}}"
                             name="{{$booking_user_allotment->allotment->name}}"
                             address="{{$booking_user_allotment->allotment->address}}"
                            date="{{$booking_user_allotment->allotment->date->format('d-m-Y')}}">
                <div class="flex justify-end">
                    <form method="POST" action="{{ route('booking.user.allotment.destroy') }}">
                        @csrf
                        <input type="hidden" name="booking_user_allotment_id" value="{{$booking_user_allotment->id}}">
                        <x-buttons.form-button name="{{__('Cancel')}} {{__('Booking')}} {{__('Allotment')}}">
                            <i class="mr-2 fa-lg fa-fw fa-solid fa-ban"></i></x-buttons.form-button>
                    </form>
                </div>
            </x-cards.booking>
        @empty
            <div class="mx-4 my-1 text-gray-900 dark:text-white">
                {{__('No')}} {{__('Allotments')}} {{__('Booked')}}...
            </div>
        @endforelse
    </x-cards.input>
</x-app-public-layout>