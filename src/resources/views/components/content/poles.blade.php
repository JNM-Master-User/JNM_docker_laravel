<div {{$attributes->merge(['class'=>''])}}>
    <!-- breadcrumb -->
    <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
        <x-breadcrumb content="{{__('Poles')}}">
        </x-breadcrumb>
    </div>
    <!-- end breadcrumb -->
    <x-cards.input>
        @if(session()->get('success_poles'))
            <x-input-success :messages="session()->get('success_poles')" class="mt-2"/>
        @elseif(session()->get('error_poles'))
            <x-input-error :messages="session()->get('error_poles')" class="mt-2"/>
        @endif
        <form method="POST" action="{{ route('poles.save') }}">
            <x-cards.fieldset>
                @csrf
                <!-- Name -->
                <div class="mt-4">
                    <x-input-label for="name" :value="__('Name')"/>
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" autofocus/>
                    <x-input-error objectName="pole" :messages="$errors->get('name')" class="mt-2"/>
                </div>
                <div class="flex items-center justify-end mt-4">
                    <x-buttons.primary-button class="ml-4" type="submit">
                        {{ __('Save') }}
                    </x-buttons.primary-button>
                </div>
            </x-cards.fieldset>
        </form>
    </x-cards.input>
    @foreach($poles as $pole)
    <x-cards.input>
        <div>
            {{$pole->id}}
        </div>
        <div>
            {{$pole->name}}
        </div>
        <div>
            {{$pole->created_at}}
        </div>
        <div>
            {{$pole->updated_at}}
        </div>
        <form method="POST" action="{{ route('poles.destroy') }}">
            @csrf
            <input type="hidden" name="id" value="{{$pole->id}}">
            <x-buttons.delete-button type="submit">
                {{ __('Delete') }}
            </x-buttons.delete-button>
        </form>
    </x-cards.input>
    @endforeach
</div>