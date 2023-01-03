<x-app-public-layout>
    <div class="p-4 bg-white dark:bg-gray-700 block sm:flex items-center justify-between">
        <x-breadcrumb content="{{__('Events')}}">
        </x-breadcrumb>
    </div>
    <x-cards.input>
        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">{{__('All Events')}}</h5>
        @if(session()->get('success_events'))
            <x-input-success :messages="session()->get('success_events')" class="mt-2"/>
        @elseif(session()->get('error_events'))
            <x-input-error :messages="session()->get('error_events')" class="mt-2"/>
        @endif
    </x-cards.input>
    <x-cards.input>
        <x-cards.title icon="fa-bed" title="{{__('Events')}}">
            <x-slot name="icon">
                <x-icons.allotments class="fa-2xl mb-10"></x-icons.allotments>
            </x-slot>
        </x-cards.title>
        @forelse($events as $event)
            <x-cards.booking img="{{asset('storage/events/'.$event->path_picture)}}"
                             name="{{$event->name}}"
                             address="{{$event->address}}"
                             date="{{$event->date->format('d-m-Y')}}"
                             desc="{{$event->desc}}">
                <div class="flex justify-end">
                    <form method="POST" action="{{ route('booking.user.event.store') }}">
                        @csrf
                        <input type="hidden" name="id_event" value="{{$event->id}}">
                        <x-buttons.form-button name="{{__('Book Event')}}"><i class="mr-2 fa-lg fa-fw fa-solid fa-bookmark"></i></x-buttons.form-button>
                    </form>
                </div>
            </x-cards.booking>
        @empty
            <div class="mx-4 my-1 text-gray-900 dark:text-white">
                {{__('No')}} {{__('Allotments')}} {{__('to book')}}...
            </div>
        @endforelse
    </x-cards.input>
</x-app-public-layout>