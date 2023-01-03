<div>
    <form method="POST" action="{{ route('poles.update') }}">
        <table class="table-fixed min-w-full divide-y divide-gray-200">
            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-500">
                <tr class="hover:bg-gray-100">
                    @csrf
                    <input class="hidden" name="id" value='{{$pole->id}}'>
                    <td class="p-2 w-4">
                        <div class="flex items-center">
                            <input id="checkbox-3" aria-describedby="checkbox-1" type="checkbox" class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded">
                        </div>
                    </td>
                    <td class="p-2 flex items-center whitespace-nowrap space-x-6 mr-12 lg:mr-0">
                        <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name={{$pole->name}}"
                             alt="">
                        <div class="text-sm font-normal text-gray-500">
                            <div id="pole-name-{{$pole->id}}"
                                 class="text-sm font-normal text-gray-500">{{$pole->name}}</div>
                        </div>
                    </td>

                    <td class="p-2 whitespace-nowrap space-x-2">
                        <input type="hidden" name="id" value="{{$pole->id}}">
                        <button id="buttonSavePole-{{$pole->id}}" type="submit" class="hidden text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                            <i class="mr-2 fa-lg fa-fw fa-solid fa-user-pen"></i>
                            {{__('Save Pole')}}
                        </button>
                    </td>
                    <td class="p-2 whitespace-nowrap space-x-2">
                        <button  id="buttonEditPole-{{$pole->id}}" type="button" class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                            <i class="mr-2 fa-lg fa-fw fa-solid fa-user-pen"></i>
                            {{__('Edit Pole')}}
                        </button>
                        <!-- Script -->
                        <script type="text/javascript">
                            document.getElementById('buttonEditPole-{{$pole->id}}').addEventListener('click', () => {
                                let element1 = document.getElementById('buttonSavePole-{{$pole->id}}');
                                element1.classList.toggle('hidden');

                                let element2 = document.getElementById('buttonEditPole-{{$pole->id}}');
                                element2.disabled = true;
                                document.getElementById('pole-name-{{$pole->id}}').innerHTML = `<input name="name" value='{{$pole->name}}' />`;
                            });
                        </script>
                    </td>
                    <td class="p-2 whitespace-nowrap space-x-2">
                        <form method="POST" action="{{ route('poles.destroy') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{$pole->id}}">
                            <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                                <i class="mr-2 fa-lg fa-fw fa-solid fa-trash-can"></i>
                                {{__('Delete Pole')}}
                            </button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
