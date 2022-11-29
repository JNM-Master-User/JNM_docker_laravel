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
                <form method="POST" action="{{ route('transports.save') }}">
                    <fieldset id="sensitive_data_fieldset">
                        @csrf
                        <!-- Name -->
                        <div class="mt-4">
                            <x-input-label for="name" :value="__('Name')"/>

                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" autofocus/>

                            <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                        </div>
                        <div class="mt-4">
                            <x-input-label for="path_picture" :value="__('Path picture')"/>

                            <x-text-input id="path_picture" class="block mt-1 w-full" type="text" name="path_picture" autofocus/>

                            <x-input-error :messages="$errors->get('path_picture')" class="mt-2"/>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-buttons.primary-button class="ml-4" type="submit">
                                {{ __('Save') }}
                            </x-buttons.primary-button>
                        </div>
                    </fieldset>
                </form>
                @foreach($transports as $transports)
                    <x-cards.input>
                    {{$transports->name}}
                    {{$transports->path_picture}}
                        <form method="POST" action="{{ route('transports.destroy') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{$transports->id}}">
                            <x-buttons.delete-button type="submit">
                                {{ __('Delete') }}
                            </x-buttons.delete-button>
                        </form>
                        </x-cards.input>
                @endforeach
            </div>
        </x-cards.card>
    </div>
</div>
