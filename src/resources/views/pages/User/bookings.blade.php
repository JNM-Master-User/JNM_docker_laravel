<x-app-public-layout>
    <div class="p-4 bg-white dark:bg-gray-700 block sm:flex items-center justify-between">
        <x-breadcrumb content="{{__('Bookings')}}">
        </x-breadcrumb>
    </div>
    <x-cards.input>
        <form method="GET" action="{{ route('events') }}">
            @csrf
            <x-buttons.link-button name="{{__('Events')}}"><i class=""></i></x-buttons.link-button>
        </form>
    </x-cards.input>
    <x-cards.input>
        <form method="GET" action="{{ route('allotments') }}">
            @csrf
            <x-buttons.link-button name="{{__('Allotments')}}"><i class=""></i></x-buttons.link-button>
        </form>
    </x-cards.input>
    <x-cards.input>
        <form method="GET" action="{{ route('transports') }}">
            @csrf
            <x-buttons.link-button name="{{__('Transports')}}"><i class=""></i></x-buttons.link-button>
        </form>
    </x-cards.input>
</x-app-public-layout>