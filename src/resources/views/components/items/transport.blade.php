<tr class="hover:bg-gray-100">
    <td class="p-2 w-4">
        <div class="flex items-center">
            <input id="checkbox-3" aria-describedby="checkbox-1" type="checkbox" class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded">
        </div>
    </td>
    <td class="p-2 flex items-center whitespace-nowrap space-x-6 mr-12 lg:mr-0">
        <img class="h-10 w-10 rounded-full" src="{{asset('storage/transports/'.$transport->path_picture)}}">
        <div class="text-sm font-normal text-gray-500">
            <div class="text-sm font-normal text-gray-500">{{$transport->name}}</div>
        </div>
    </td>
    <td class="p-2 whitespace-nowrap text-base font-medium text-gray-900">
        <div class="text-sm font-normal text-gray-500">{{$transport->path_picture}}</div>
    </td>
    <td class="p-2 whitespace-nowrap space-x-2">
        <x-buttons.default-button type="button" class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
            <i class="mr-2 fa-lg fa-fw fa-solid fa-user-pen"></i>
            {{__('Edit')}}
        </x-buttons.default-button>
        <x-buttons.delete-button type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
            <i class="mr-2 fa-lg fa-fw fa-solid fa-trash-can"></i>
            {{__('Delete')}}
        </x-buttons.delete-button>
    </td>
</tr>
