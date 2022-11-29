<div {{$attributes->merge(['class'=>''])}}>
    <!-- breadcrumb -->
    <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
        <x-breadcrumb content="{{__('Videos')}}">
        </x-breadcrumb>
    </div>
    <!-- end breadcrumb -->
    <div class="pt-6 px-6">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                @if(session()->get('success_videos'))
                    <div class="bg-green-200 rounded-lg py-5 px-6 mb-4 text-base text-green-700 mb-3">
                        {{ session()->get('success_videos') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('videos.save') }}">
                    <fieldset id="sensitive_data_fieldset">
                        @csrf
                        <!-- Name -->
                        <div class="mt-4">
                            <x-input-label for="title" :value="__('Title')"/>

                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" autofocus/>

                            <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                        </div>
                        <div class="mt-4">
                            <x-input-label for="path_youtube" :value="__('Path_youtube')"/>

                            <x-text-input id="path_youtube" class="block mt-1 w-full" type="text" name="path_youtube" autofocus/>

                            <x-input-error :messages="$errors->get('path_youtube')" class="mt-2"/>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-buttons.primary-button class="ml-4" type="submit">
                                {{ __('Save') }}
                            </x-buttons.primary-button>
                        </div>
                    </fieldset>
                </form>
                @foreach($videos as $videos)
                    <x-cards.input>
                        {{$videos->title}}
                        {{$videos->path_youtube}}
                        <form method="POST" action="{{ route('videos.destroy') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{$videos->id}}">
                            <x-buttons.delete-button type="submit">
                                {{ __('Delete') }}
                            </x-buttons.delete-button>
                        </form>
                    </x-cards.input>
                @endforeach
            </div>
        </div>
    </div>
</div>
