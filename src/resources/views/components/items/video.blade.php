<div>
    <form method="POST" action="{{ route('videos.update') }}">
        <table class="table-fixed min-w-full divide-y divide-gray-200">
            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-500">
            <tr class="hover:bg-gray-100">
                @csrf
                <input class="hidden" name="id" value='{{$video->id}}'>
                <td class="p-2 w-4">
                    <div class="flex items-center">
                        <input id="checkbox-3" aria-describedby="checkbox-1" type="checkbox" class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded">
                    </div>
                </td>
                <td class="p-2 flex items-center whitespace-nowrap space-x-6 mr-12 lg:mr-0">
                    <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name={{$video->id}}"
                         alt="">
                    <div class="text-sm font-normal text-gray-500">
                        <div id="video-title-{{$video->id}}"
                             class="text-sm font-normal text-gray-500">{{$video->title}}</div>
                    </div>
                </td>
                <td class="p-2 whitespace-nowrap text-base font-medium text-gray-900">
                    <div id="video-path_youtube-{{$video->id}}"
                         class="text-sm font-normal text-gray-500">{{$video->path_youtube}}</div>
                </td>

                <td class="p-2 whitespace-nowrap space-x-2">
                    <input type="hidden" name="id" value="{{$video->id}}">
                    <button id="buttonSaveVideo-{{$video->id}}" type="submit" class="hidden text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                        <i class="mr-2 fa-lg fa-fw fa-solid fa-user-pen"></i>
                        {{__('Save Video')}}
                    </button>
                </td>
                <td class="p-2 whitespace-nowrap space-x-2">
                    <button id="buttonEditVideo-{{$video->id}}" type="button"
                            class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                        <i class="mr-2 fa-lg fa-fw fa-solid fa-user-pen"></i>
                        {{__('Edit Video')}}
                    </button>
                    <!-- Script -->
                    <script type="text/javascript">
                        document.getElementById('buttonEditVideo-{{$video->id}}').addEventListener('click', () => {
                            let element1 = document.getElementById('buttonSaveVideo-{{$video->id}}');
                            element1.classList.toggle('hidden');

                            let element2 = document.getElementById('buttonEditVideo-{{$video->id}}');
                            element2.disabled = true;
                            document.getElementById('video-title-{{$video->id}}').innerHTML = `<input name="title" value='{{$video->title}}' />`;
                            document.getElementById('video-path_youtube-{{$video->id}}').innerHTML = `<input name="path_youtube" value='{{$video->path_youtube}}'  />`;
                        });
                    </script>
                </td>
                <td class="p-2 whitespace-nowrap space-x-2">
                    <form method="POST" action="{{ route('videos.destroy') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{$video->id}}">
                        <button id="buttonDeleteVideo" type="submit"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2 text-center">
                            <i class="mr-2 fa-lg fa-fw fa-solid fa-trash-can"></i>
                            {{__('Delete Video')}}
                        </button>
                    </form>
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>

