<div>
    <form method="POST" action="{{ route('partners.update') }}">
        <table class="table-fixed min-w-full divide-y divide-gray-200">
        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-500">
            <tr class="hover:bg-gray-100">
                @csrf
                <input class="hidden" name="id" value='{{$partner->id}}'>
                <td class="p-2 w-4">
                    <div class="flex items-center">
                        <input id="checkbox-3" aria-describedby="checkbox-1" type="checkbox" class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded">
                    </div>
                </td>
                <td class="p-2 flex items-center whitespace-nowrap space-x-6 mr-12 lg:mr-0">
                    <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name={{$partner->name}}" alt="Michael Gough avatar">
                    <div class="text-sm font-normal text-gray-500">
                        <div id="partner-name-{{$partner->id}}" class="text-sm font-normal text-gray-500">{{$partner->name}}</div>
                    </div>
                </td>
                <td class="p-2 whitespace-nowrap text-base font-medium text-gray-900">
                    <div id="partner-company-{{$partner->id}}" class="text-sm font-normal text-gray-500">{{$partner->company}}</div>
                </td>

                <td class="p-2 whitespace-nowrap text-base font-medium text-gray-900">
                    <div id="partner-path_picture-{{$partner->id}}" class="text-sm font-normal text-gray-500">{{$partner->path_picture}}</div>
                </td>
                <td class="p-2 whitespace-nowrap space-x-2">
                    <input type="hidden" name="id" value="{{$partner->id}}">
                    <button id="buttonSavePartner-{{$partner->id}}" type="submit" class="hidden text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                        <i class="mr-2 fa-lg fa-fw fa-solid fa-user-pen"></i>
                        {{__('Save Partner')}}
                    </button>
                </td>

                <td class="p-2 whitespace-nowrap space-x-2">
                    <button id="buttonEditPartner-{{$partner->id}}" type="button"
                            class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                        <i class="mr-2 fa-lg fa-fw fa-solid fa-user-pen"></i>
                        {{__('Edit Partner')}}
                    </button>
                    <!-- Script -->
                    <script type="text/javascript">
                        document.getElementById('buttonEditPartner-{{$partner->id}}').addEventListener('click', () => {
                            let element1 = document.getElementById('buttonSavePartner-{{$partner->id}}');
                            element1.classList.toggle('hidden');

                            let element2 = document.getElementById('buttonEditPartner-{{$partner->id}}');
                            element2.disabled = true;
                            document.getElementById('partner-name-{{$partner->id}}').innerHTML = `<input name="name" value='{{$partner->name}}' />`;
                            document.getElementById('partner-company-{{$partner->id}}').innerHTML = `<input name="company" value='{{$partner->company}}'  />`;
                            document.getElementById('partner-path_picture-{{$partner->id}}').innerHTML = `<input name="path_picture" value='{{$partner->path_picture}}'  />`;
                        });
                    </script>
                </td>

                <td class="p-2 whitespace-nowrap space-x-2">
                    <form method="POST" action="{{ route('partners.destroy') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{$partner->id}}">
                        <button type="submit" data-modal-toggle="delete-user-modal" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                            <i class="mr-2 fa-lg fa-fw fa-solid fa-trash-can"></i>
                            {{__('Delete Partner')}}
                        </button>
                    </form>
                </td>
            </tr>
        </tbody>
        </table>
    </form>
</div>
