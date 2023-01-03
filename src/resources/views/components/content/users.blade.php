<div {{$attributes->merge(['class'=>''])}}>
    <!-- breadcrumb -->
    <div class="p-4 bg-white dark:bg-gray-700 block sm:flex items-center justify-between">
        <x-breadcrumb content="{{__('Users')}}">
        </x-breadcrumb>
    </div>
    <!-- end breadcrumb -->
    @if(session()->get('success_user'))
    <x-cards.input>
        <x-input-success :messages="session()->get('success_user')" class="mt-2"/>
    </x-cards.input>
    @elseif(session()->get('error_user'))
    <x-cards.input>
        <x-input-error :messages="session()->get('error_user')" class="mt-2"/>
    </x-cards.input>
    @endif
    <x-cards.table>
        <x-table.users>
            @forelse($users as $user)
                <x-items.user :user="$user">
                </x-items.user>
            @empty
                <div class="mx-4 my-1 text-gray-900 dark:text-white">
                    {{__('No')}} {{__('Users')}}...
                </div>
            @endforelse
        </x-table.users>
    </x-cards.table>
</div>
