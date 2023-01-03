<x-app-public-layout>
    <div class="p-4 bg-white dark:bg-gray-700 block sm:flex items-center justify-between">
        <x-breadcrumb content="{{__('Partners')}}">
        </x-breadcrumb>
    </div>
    <x-cards.input>
        <div class="flex justify-center">
        @forelse($partners as $partner)
                <img class="m-4 object-contain" src="{{asset('storage/partners/'.$partner->path_picture)}}" width="120" alt="">
        @empty
            <div class="mx-4 my-1 text-gray-900 dark:text-white">
                {{__('No')}} {{__('Partner')}}...
            </div>
        @endforelse
        </div>
    </x-cards.input>
</x-app-public-layout>