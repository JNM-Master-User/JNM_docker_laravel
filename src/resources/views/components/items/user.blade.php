<tr class="hover:bg-gray-100">
    <td class="w-72 p-2 flex items-center whitespace-nowrap space-x-6 mr-12 lg:mr-0">
        <img class="h-10 w-10 rounded-full" src="{{asset('storage/users_profile_picture/'.$user->userSensitiveData->path_picture)}}" alt="">
        <div class="text-sm font-normal text-gray-500">
            <div class="text-base font-semibold text-gray-900">{{$user->userSensitiveData->name ?? ''}} {{$user->userSensitiveData->last_name ?? ''}}</div>
            <div class="text-sm font-normal text-gray-500">{{$user->email}}</div>
        </div>
    </td>
    <td class="p-2 whitespace-nowrap text-base font-medium text-gray-900"><x-badges.green-badge text="{{$user->created_at->format('d-m-Y h:i:s')}}"></x-badges.green-badge></td>
    <td class="p-2 whitespace-nowrap text-base font-medium text-gray-900"><x-badges.purple-badge text="{{$user->updated_at->format('d-m-Y h:i:s')}}"></x-badges.purple-badge></td>
    <td class="p-2 whitespace-nowrap text-base font-normal text-gray-900">
        <div class="flex items-center">
            @if($user->email_verified_at)
                <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div>
            {{__('Verified')}}
            @else
                <div class="h-2.5 w-2.5 rounded-full bg-red-400 mr-2"></div>
            {{__('Unverified')}}
            @endif
        </div>
    </td>
    <td class="p-2 whitespace-nowrap space-x-2">
        <div class="flex justify-end w-48">
            <form method="POST" action="{{ route('users.destroy') }}">
                @csrf
                <input type="hidden" name="user_id" value="{{$user->id}}">
                <x-buttons.form-button name="{{__('Delete User')}}"><i class="mr-2 fa-lg fa-fw fa-solid fa-trash-can"></i></x-buttons.form-button>
            </form>
        </div>
    </td>
</tr>