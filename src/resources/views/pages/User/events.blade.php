<x-app-public-layout>
    <div class="p-4 bg-white dark:bg-gray-700 block sm:flex items-center justify-between">
        <x-breadcrumb content="{{__('Events')}}">
        </x-breadcrumb>
    </div>
    <x-cards.input>
        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">{{__('All Events')}}</h5>
    </x-cards.input>
</x-app-public-layout>