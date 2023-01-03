<div>
    <form method="POST" action="{{ route('institutions.update') }}">
        <table class="table-fixed min-w-full divide-y divide-gray-200">
            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-500">
                <tr class="hover:bg-gray-100">
                    @csrf
                    <input class="hidden" name="id" value='{{$institution->id}}'>
                    <td class="p-2 w-4">
                        <div class="flex items-center">
                            <input id="checkbox-3" aria-describedby="checkbox-1" type="checkbox" class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded">
                        </div>
                    </td>
                    <td class="p-2 flex items-center whitespace-nowrap space-x-6 mr-12 lg:mr-0">
                        <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name={{$institution->name}}"
                             alt="">
                        <div class="text-sm font-normal text-gray-500">
                            <div id="institution-name-{{$institution->id}}"
                                 class="text-sm font-normal text-gray-500">{{$institution->name}}
                            </div>
                        </div>
                    </td>
                    <td class="p-2 whitespace-nowrap text-base font-medium text-gray-900">
                        <div id="institution-address-{{$institution->id}}"
                             class="text-sm font-normal text-gray-500">{{$institution->address}}
                        </div>
                    </td>

                    <td class="p-2 whitespace-nowrap text-base font-medium text-gray-900">
                        <div id="institution-path_picture-{{$institution->id}}"
                             class="text-sm font-normal text-gray-500">{{$institution->path_picture}}
                        </div>
                    </td>
                    <td class="p-2 whitespace-nowrap text-base font-medium text-gray-900">
                        @if($institution->desc != null)
                            <div id="institution-desc-{{$institution->id}}"
                                 class="text-sm font-normal text-gray-500">{{$institution->desc}}
                            </div>
                        @else
                            <div id="institution-desc-{{$institution->id}}"
                                 class="text-sm font-normal text-gray-500">??
                            </div>
                        @endif
                    </td>
                    <td class="p-2 whitespace-nowrap space-x-2">
                        <input type="hidden" name="id" value="{{$institution->id}}">
                        <button id="buttonSaveInstitution-{{$institution->id}}" type="submit" class="hidden text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                            <i class="mr-2 fa-lg fa-fw fa-solid fa-user-pen"></i>
                            {{__('Save Institution')}}
                        </button>
                    </td>
                    <td class="p-2 whitespace-nowrap space-x-2">
                        <button id="buttonEditInstitution-{{$institution->id}}" type="button" class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                            <i class="mr-2 fa-lg fa-fw fa-solid fa-user-pen"></i>
                            {{__('Edit Institution')}}
                        </button>
                        <!-- Script -->
                        <script type="text/javascript">
                            document.getElementById('buttonEditInstitution-{{$institution->id}}').addEventListener('click', () => {
                                let element1 = document.getElementById('buttonSaveInstitution-{{$institution->id}}');
                                element1.classList.toggle('hidden');

                                let element2 = document.getElementById('buttonEditInstitution-{{$institution->id}}');
                                element2.disabled = true;
                                document.getElementById('institution-name-{{$institution->id}}').innerHTML = `<input name="name" value='{{$institution->name}}' />`;
                                document.getElementById('institution-address-{{$institution->id}}').innerHTML = `<input name="address" value='{{$institution->address}}'  />`;
                                document.getElementById('institution-path_picture-{{$institution->id}}').innerHTML = `<input name="path_picture" value='{{$institution->path_picture}}'  />`;
                                document.getElementById('institution-desc-{{$institution->id}}').innerHTML = `<input name="desc" value='{{$institution->desc}}'  />`;
                            });
                        </script>
                    </td>

                    <td class="p-2 whitespace-nowrap space-x-2">
                        <form method="POST" action="{{ route('institutions.destroy') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{$institution->id}}">
                            <button id="buttonDeleteInstitution" type="submit" data-modal-toggle="delete-user-modal" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                                <i class="mr-2 fa-lg fa-fw fa-solid fa-trash-can"></i>
                                {{__('Delete institution')}}
                            </button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
