<div>
    <form method="POST" action="{{ route('allotments.update') }}">
        <table class="table-fixed min-w-full divide-y divide-gray-200">
            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-500">
            <tr class="hover:bg-gray-100">
                @csrf
                <input class="hidden" name="id" value='{{$allotment->id}}'>
                <td class="p-2 w-4">
                    <div class="flex items-center">
                        <input id="checkbox-3" aria-describedby="checkbox-1" type="checkbox" class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded">
                    </div>
                </td>
                <td class="p-2 flex items-center whitespace-nowrap space-x-6 mr-12 lg:mr-0">
                    <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name={{$allotment->name}}"
                         alt="">
                    <div class="text-sm font-normal text-gray-500">
                        <div id="allotment-name-{{$allotment->id}}"
                             class="text-sm font-normal text-gray-500">{{$allotment->name}}</div>
                    </div>
                </td>
                <td class="p-2 whitespace-nowrap text-base font-medium text-gray-900">
                    <div id="allotment-address-{{$allotment->id}}"
                         class="text-sm font-normal text-gray-500">{{$allotment->address}}</div>
                </td>
                <td class="p-2 whitespace-nowrap text-base font-medium text-gray-900">
                    <div id="allotment-zipcode-{{$allotment->id}}"
                         class="text-sm font-normal text-gray-500">{{$allotment->zip_code}}</div>
                </td>

                <td class="p-2 whitespace-nowrap space-x-2">
                    <input type="hidden" name="id" value="{{$allotment->id}}">
                    <button id="buttonSaveAllotment-{{$allotment->id}}" type="submit" class="hidden text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                        <i class="mr-2 fa-lg fa-fw fa-solid fa-user-pen"></i>
                        {{__('Save Allotment')}}
                    </button>
                </td>
                <td class="p-2 whitespace-nowrap space-x-2">
                    <button id="buttonEditAllotment-{{$allotment->id}}" type="button"
                            class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                        <i class="mr-2 fa-lg fa-fw fa-solid fa-user-pen"></i>
                        {{__('Edit Allotment')}}
                    </button>
                    <!-- Script -->
                    <script type="text/javascript">
                        document.getElementById('buttonEditAllotment-{{$allotment->id}}').addEventListener('click', () => {
                            let element1 = document.getElementById('buttonSaveAllotment-{{$allotment->id}}');
                            element1.classList.toggle('hidden');

                            let element2 = document.getElementById('buttonEditAllotment-{{$allotment->id}}');
                            element2.disabled = true;
                            document.getElementById('allotment-name-{{$allotment->id}}').innerHTML = `<input name="name" value='{{$allotment->name}}' />`;
                            document.getElementById('allotment-address-{{$allotment->id}}').innerHTML = `<input name="address" value='{{$allotment->address}}'  />`;
                            document.getElementById('allotment-zipcode-{{$allotment->id}}').innerHTML = `<input name="zip_code" value='{{$allotment->zip_code}}'  />`;
                        });
                    </script>
                </td>
                <td class="p-2 whitespace-nowrap space-x-2">
                    <form method="POST" action="{{ route('allotments.destroy') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{$allotment->id}}">
                        <button id="buttonDeleteAllotment" type="submit"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                            <i class="mr-2 fa-lg fa-fw fa-solid fa-trash-can"></i>
                            {{__('Delete Allotment')}}
                        </button>
                    </form>
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>

