<div {{$attributes->merge(['class'=>''])}}>
    <!-- breadcrumb -->
    <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
        <x-breadcrumb content="{{__('Transports')}}">
        </x-breadcrumb>
    </div>
    <!-- end breadcrumb -->
    <div class="md:pt-6 md:px-6">
        <x-cards.card>
            <div class="p-6">
                @if(session()->get('success_transports'))
                    <x-input-success :messages="session()->get('success_transports')" class="mt-2"/>
                @elseif(session()->get('error_transports'))
                    <x-input-error :messages="session()->get('error_transports')" class="mt-2"/>
                @endif
            </div>
        </x-cards.card>
    </div>
</div>