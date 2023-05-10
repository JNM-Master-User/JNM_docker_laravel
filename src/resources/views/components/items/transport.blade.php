<div class="divide-y">
    <form method="POST" action="{{ route('transports.update') }}"></form>
    <table class="table-fixed  divide-gray-200">
        <tbody class="bg-white  divide-gray-200 dark:divide-gray-500 border-gray-300">
        <tr class="hover:bg-gray-100 border-gray-500">
            @csrf
            <td class="p-2 w-72 flex items-center whitespace-nowrap space-x-6 mr-2">
                <img class="h-10 w-10 rounded-full" src="{{asset('storage/transports/'.$transport->path_picture)}}"
                     alt="">
                <div class="text-sm font-normal text-gray-500">
                    <div id="transport-name-{{$transport->id}}"
                         class="text-sm font-normal text-gray-500">{{$transport->name}}</div>
                </div>
            </td>
            <td class="p-2 w-96 whitespace-nowrap font-medium text-gray-900">
                <div id="transport-address-{{$transport->id}}"
                     class="text-sm font-normal text-gray-500">{{$transport->path_picture}}</div>
            </td>
            <td class="p-2 whitespace-nowrap space-x-2">
                <div class="w-48 flex justify-end">
                    <input type="hidden" name="transport_id" value="{{$transport->id}}" form="update_transport_form">
                    <button id="buttonSaveTransport-{{$transport->id}}" type="submit"
                            class="hidden text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                        <i class="mr-2 fa-lg fa-fw fa-solid fa-user-pen"></i>
                        {{__('Save Transport')}}
                    </button>
                </div>
            </td>
            <td class="p-2 whitespace-nowrap space-x-2">
                <div class="w-48 flex justify-end">
                    <x-buttons.default-button id="buttonEditTransport-{{$transport->id}}">
                        <i class="mr-2 fa-lg fa-fw fa-solid fa-user-pen"></i>
                        {{__('Edit Transport')}}
                    </x-buttons.default-button>
                    <!-- Script -->
                    <script type="text/javascript">
                        document.getElementById('buttonEditTransport-{{$transport->id}}').addEventListener('click', () => {
                            let element1 = document.getElementById('buttonSaveTransport-{{$transport->id}}');
                            element1.classList.toggle('hidden');

                            let element2 = document.getElementById('buttonEditTransport-{{$transport->id}}');
                            element2.disabled = true;
                            document.getElementById('transport-name-{{$transport->id}}').innerHTML = `<input name="transport_name" value='{{$transport->name}}' form="update_transport_form">`;
                        });
                    </script>
                </div>
            </td>
            <td class="p-2 whitespace-nowrap space-x-2">
                <div class="w-64 flex justify-end">
                    <form method="POST" action="{{ route('transports.destroy') }}">
                        @csrf
                        <input type="hidden" name="transport_id" value="{{$transport->id}}">
                        <x-buttons.form-button>
                            <i class="mr-2 fa-lg fa-fw fa-solid fa-trash-can"></i>
                            {{__('Delete Transport')}}
                            </x-buttons.form-button>
                        </form>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
</div>


