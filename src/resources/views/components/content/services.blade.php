<div {{$attributes->merge(['class'=>''])}}>
    <!-- breadcrumb -->
    <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
        <x-breadcrumb content="{{__('Services')}}">
        </x-breadcrumb>
    </div>
    <!-- end breadcrumb -->
    <x-cards.input>
                @if(session()->get('success_services'))
                    <div class="bg-green-200 rounded-lg py-5 px-6 mb-4 text-base text-green-700 mb-3">
                        {{ session()->get('success_services') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('services.save') }}">
                    <x-cards.fieldset>
                        @csrf
                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')"/>
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" autofocus/>
                            <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                        </div>
                        <div>
                            <x-input-label for="desc" :value="__('Desc')"/>
                            <x-text-input id="desc" class="block mt-1 w-full" type="text" name="desc" autofocus/>
                            <x-input-error :messages="$errors->get('desc')" class="mt-2"/>
                        </div>
                    </x-cards.fieldset>
                    <div class="flex items-center justify-end mt-4">
                        <x-buttons.primary-button class="ml-4" type="submit">
                            {{ __('Save') }}
                        </x-buttons.primary-button>
                    </div>
                </form>
                @foreach($services as $services)
                    <x-cards.input>
                        {{$services->name}}
                        {{$services->desc}}
                        <form method="POST" action="{{ route('services.destroy') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{$services->id}}">
                            <x-buttons.delete-button type="submit">
                                {{ __('Delete') }}
                            </x-buttons.delete-button>
                        </form>
                    </x-cards.input>
                @endforeach
    </x-cards.input>
</div>

