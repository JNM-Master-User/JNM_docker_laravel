<x-app-public-layout>
    <div class="p-4 bg-white dark:bg-gray-700 block sm:flex items-center justify-between">
        <x-breadcrumb content="{{__('Allotments')}}">
        </x-breadcrumb>
    </div>
    <x-cards.input>
        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">{{__('All Allotments')}}</h5>
    </x-cards.input>
    <x-cards.input>
        @if(session()->get('success_allotments'))
            <x-input-success :messages="session()->get('success_allotments')" class="mt-2"/>
        @elseif(session()->get('error_allotments'))
            <x-input-error :messages="session()->get('error_allotments')" class="mt-2"/>
        @endif
        <x-cards.title icon="fa-bed" title="{{__('Events')}}">
            <x-slot name="icon">
                <x-icons.allotments class="fa-2xl mb-10"></x-icons.allotments>
            </x-slot>
        </x-cards.title>
        @forelse($allotments as $allotment)
            <x-cards.booking img="{{asset('storage/allotments/'.$allotment->path_picture)}}"
                             name="{{$allotment->name}}"
                             address="{{$allotment->address}}"
                             desc="{{$allotment->desc}}">
                <div class="flex justify-end">
                    <form method="POST" action="{{ route('booking.user.allotment.store') }}">
                        @csrf
                        <input type="hidden" name="id_allotment" value="{{$allotment->id}}">
                        <x-buttons.form-button name="{{__('Book Allotment')}}"><i class="mr-2 fa-lg fa-fw fa-solid fa-bookmark"></i></x-buttons.form-button>
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