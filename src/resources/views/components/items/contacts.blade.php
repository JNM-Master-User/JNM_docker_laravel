<div>
    <form method="POST" action="{{ route('contacts.update') }}">
        <table class="table-fixed min-w-full divide-y divide-gray-200">
            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-500">
                <tr class="hover:bg-gray-100">
                    @csrf
                    <input class="hidden" name="id" value='{{$contact->id}}'>
                    <td class="p-2 w-4">
                        <div class="flex items-center">
                            <input id="checkbox-3" aria-describedby="checkbox-1" type="checkbox" class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded">
                        </div>
                    </td>
                    <td class="p-2 flex items-center whitespace-nowrap space-x-6 mr-12 lg:mr-0">
                        <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name={{$contact->name}}" alt="Michael Gough avatar">
                        <div class="text-sm font-normal text-gray-500">
                            <div id="contact-name-{{$contact->id}}"
                                 class="text-sm font-normal text-gray-500">{{$contact->name}}</div>
                        </div>
                    </td>
                    <td class="p-2 whitespace-nowrap text-base font-medium text-gray-900">
                        <div id="contact-last_name-{{$contact->id}}"
                            class="text-sm font-normal text-gray-500">{{$contact->last_name}}
                        </div>
                    </td>
                    <td class="p-2 whitespace-nowrap text-base font-medium text-gray-900">
                        <div id="contact-name_pole-{{$contact->id}}"
                             class="text-sm font-normal text-gray-500">{{$contact->pole->name}}
                        </div>
                    </td>
                    <td class="p-2 whitespace-nowrap text-base font-medium text-gray-900">
                        <div id="contact-name_role-{{$contact->id}}"
                             class="text-sm font-normal text-gray-500">{{$contact->role->name}}
                        </div>
                    </td>

                    <td class="p-2 whitespace-nowrap space-x-2">
                        <input type="hidden" name="id" value="{{$contact->id}}">
                        <button id="buttonSaveContact-{{$contact->id}}" type="submit" class="hidden text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                            <i class="mr-2 fa-lg fa-fw fa-solid fa-user-pen"></i>
                            {{__('Save Contact')}}
                        </button>
                    </td>

                    <td class="p-2 whitespace-nowrap space-x-2">
                        <button id="buttonEditContact-{{$contact->id}}" type="button" class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                            <i class="mr-2 fa-lg fa-fw fa-solid fa-user-pen"></i>
                            {{__('Edit contact')}}
                        </button>
                        <!-- Script -->
                        <script type="text/javascript">
                            document.getElementById('buttonEditContact-{{$contact->id}}').addEventListener('click', () => {
                                let element1 = document.getElementById('buttonSaveContact-{{$contact->id}}');
                                element1.classList.toggle('hidden');

                                let element2 = document.getElementById('buttonEditContact-{{$contact->id}}');
                                element2.disabled = true;
                                document.getElementById('contact-name-{{$contact->id}}').innerHTML = `<input name="name" value='{{$contact->name}}' />`;
                                document.getElementById('contact-last_name-{{$contact->id}}').innerHTML = `<input name="last_name" value='{{$contact->last_name}}'  />`;
                                document.getElementById('contact-name_pole-{{$contact->id}}').innerHTML = `<select name="name_pole"
                                     @foreach($poles as $pole)
                                    <option value="{{ $pole->id }}"> {{ $pole->name }} </option>
                                    @endforeach
                                'select/>`;
                                document.getElementById('contact-name_role-{{$contact->id}}').innerHTML = `<select name="name_role"
                                     @foreach($roles as $role)
                                    <option value="{{ $role->id }}"> {{ $role->name }} </option>
                                    @endforeach
                                'select/>`;
                            });
                        </script>
                    </td>
                    <td class="p-2 whitespace-nowrap space-x-2">
                        <form method="POST" action="{{ route('contacts.destroy') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{$contact->id}}">
                            <button id="buttonDeleteContact" type="submit" data-modal-toggle="delete-user-modal" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                                <i class="mr-2 fa-lg fa-fw fa-solid fa-trash-can"></i>
                                {{__('Delete contact')}}
                            </button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
