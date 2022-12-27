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
        <x-buttons.default-button type="button" data-modal-toggle="user-modal-{{$transport->id}}" class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
            <i class="mr-2 fa-lg fa-fw fa-solid fa-user-pen"></i>
            {{__('Edit')}}
        </x-buttons.default-button>
        <x-buttons.delete-button type="button" data-modal-toggle="delete-user-modal" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
            <i class="mr-2 fa-lg fa-fw fa-solid fa-trash-can"></i>
            {{__('Delete')}}
        </x-buttons.delete-button>
    </td>
    <!-- Modal -->
    <div id="user-modal-{{$transport->id}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 p-2 md:inset-0 h-modal md:h-full">
        <div class="relative w-full max-w-md h-full md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">{{__("Close modal")}}</span>
                </button>
                <div class="p-6 text-center">
                    <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">{{__("Are you sure you want to delete this product?")}}</h3>
                    <button data-modal-toggle="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        {{__("Yes, I'm sure")}}
                    </button>
                    <button data-modal-toggle="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                </div>
            </div>
        </div>
    </div>
</tr>
