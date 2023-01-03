<div class="flex flex-col">
    <div class="overflow-x-auto">
        <div class="align-middle inline-block min-w-full">
            <div class="shadow overflow-hidden md:rounded-2xl">
                <table class="table-fixed min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 dark:text-white uppercase">
                            {{__('Last Name')}}
                        </th>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 dark:text-white uppercase">
                            {{__('Address')}}
                        </th>
                        <th scope="col" class="p-4">
                        </th>
                        <th scope="col" class="p-4">
                        </th>
                     </tr>
                    </thead>
                </table>
                {{$slot}}
            </div>
        </div>
    </div>
</div>
