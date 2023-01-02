<div>
    <form method="POST" action="{{ route('events.update') }}">
        <table class="table-fixed min-w-full divide-y divide-gray-200">
            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-500">
            <tr class="hover:bg-gray-100">
                @csrf
                <input class="hidden" name="id" value='{{$event->id}}'/>
                <td class="p-2 whitespace-nowrap text-base font-medium text-gray-900">
                    <div id="event-name-{{$event->id}}" class="text-sm font-normal text-gray-500">{{$event->name}}</div>
                </td>
                <td class="p-2 whitespace-nowrap text-base font-medium text-gray-900">
                    <div id="event-address-{{$event->id}}"
                         class="text-sm font-normal text-gray-500">{{$event->address}}</div>
                </td>
                <td class="p-2 whitespace-nowrap text-base font-medium text-gray-900">
                    <div id="event-date-{{$event->id}}" class="text-sm font-normal text-gray-500">
                        <x-badges.green-badge text="{{$event->date->format('d-m-Y')}}"></x-badges.green-badge>
                    </div>
                </td>
                <td class="p-2 whitespace-nowrap text-base font-medium text-gray-900">
                    <div id="event-path_picture-{{$event->id}}" class="text-sm font-normal text-gray-500">
                        <x-badges.dark-badge text="{{$event->path_picture}}"></x-badges.dark-badge>
                    </div>
                </td>
                <td class="p-2 whitespace-nowrap text-base font-medium text-gray-900">
                    <div id="event-desc-{{$event->id}}"
                         class="text-sm font-normal text-gray-500">{{$event->desc?? ''}}</div>
                </td>
                <td class="p-2 whitespace-nowrap text-base font-medium text-gray-900">
                    <div id="event-name_institution-{{$event->id}}"
                         class="text-sm font-normal text-gray-500">{{$event->institutionManager->name?? ''}}</div>
                </td>
                <td class="p-2 whitespace-nowrap space-x-2">
                    <input type="hidden" name="id" value="{{$event->id}}">
                    <button id="buttonSaveEvent-{{$event->id}}" type="submit"
                            class="hidden text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                        <i class="mr-2 fa-lg fa-fw fa-solid fa-user-pen"></i>
                        {{__('Save Event')}}
                    </button>
                </td>
                <td class="p-2 whitespace-nowrap space-x-2">
                    <button id="buttonEditEvent-{{$event->id}}" type="button"
                            class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                        <i class="mr-2 fa-lg fa-fw fa-solid fa-user-pen"></i>
                        {{__('Edit Event')}}
                    </button>
                    <!-- Script -->
                    <script type="text/javascript">
                        document.getElementById('buttonEditEvent-{{$event->id}}').addEventListener('click', () => {
                            let element1 = document.getElementById('buttonSaveEvent-{{$event->id}}');
                            element1.classList.toggle('hidden');

                            let element2 = document.getElementById('buttonEditEvent-{{$event->id}}');
                            element2.disabled = true;
                            document.getElementById('event-name-{{$event->id}}').innerHTML = `<input name="name" value='{{$event->name}}' />`;
                            document.getElementById('event-address-{{$event->id}}').innerHTML = `<input name="address" value='{{$event->address}}'  />`;
                            document.getElementById('event-date-{{$event->id}}').innerHTML = `<input name="date" value='{{$event->date}}'  />`;
                            document.getElementById('event-path_picture-{{$event->id}}').innerHTML = `<input name="path_picture" value='{{$event->path_picture}}'  />`;
                            document.getElementById('event-desc-{{$event->id}}').innerHTML = `<input name="desc" value='{{$event->desc?? ''}}'  />`;
                            document.getElementById('event-name_institution-{{$event->id}}').innerHTML = `<input name="name_institution" value='{{$event->institutionManager->name?? ''}}'  />`;
                        });
                    </script>
                </td>
                <td class="p-2 whitespace-nowrap space-x-2">
                    <form method="POST" action="{{ route('events.destroy') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{$event->id}}">
                        <button id="buttonDeleteEvent" type="submit" data-modal-toggle="delete-user-modal"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                            <i class="mr-2 fa-lg fa-fw fa-solid fa-trash-can"></i>
                            {{__('Delete event')}}
                        </button>
                    </form>
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>
