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
                <form method="POST" action="{{ route('transports.save') }}" enctype="multipart/form-data">
                    <x-cards.fieldset>
                        @csrf
                        <div class="mt-4">
                            <x-input-label for="picture" :value="__('Picture')"/>
                            <x-inputs.dropzone id="picture" class="block mt-1 w-full" type="file" name="picture" autofocus/>
                            <x-input-error :messages="$errors->get('picture')" class="mt-2"/>
                        </div>
                        <div class="mt-4">
                            <x-input-label for="name" :value="__('Name')"/>
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" autofocus/>
                            <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                            <div class="flex items-center justify-end mt-4">
                                <x-buttons.primary-button class="ml-4" type="submit">
                                    {{ __('Save') }}
                                </x-buttons.primary-button>
                            </div>
                        </div>
                    </x-cards.fieldset>
                </form>
            </div>
        </x-cards.card>
    </div>
    @foreach($transports as $transports)
        <x-cards.input>
            {{$transports->name}}
            <img src="{{asset("transports/".$transports->path_picture)}}" height="20" width="20" alt=""/>
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
