<div {{$attributes->merge(['class'=>''])}}>
    <!-- breadcrumb -->
    <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
        <x-breadcrumb content="{{__('Users')}}">
            <x-search.users>
            </x-search.users>
        </x-breadcrumb>
    </div>
    <!-- end breadcrumb -->
    <x-table.users>
        @foreach($users as $user)
        <x-items.user :user="$user">
        </x-items.user>
        @endforeach
    </x-table.users>
</div>