<x-app-public-layout>
    <div class="p-4 bg-white dark:bg-gray-700 block sm:flex items-center justify-between">
        <x-breadcrumb content="{{__('Profil')}}">
        </x-breadcrumb>
    </div>
    <x-cards.input>
        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">{{__('My Bookings')}}</h5>
    </x-cards.input>
    <x-cards.input>
        @if(session()->get('success_profil'))
            <x-input-success :messages="session()->get('success_profil')" class="mt-2"/>
        @elseif(session()->get('error_profil'))
            <x-input-error :messages="session()->get('error_profil')" class="mt-2"/>
        @endif
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
                        <x-buttons.form-button name="{{__('Cancel Event')}}"><i
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
</x-app-public-layout>