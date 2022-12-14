<div class="flex flex-col">
    <div class="overflow-x-auto">
        <div class="align-middle inline-block min-w-full">
            <div class="shadow overflow-hidden md:rounded-2xl">
                <table class="table-fixed min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                    <tr>
                        <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input id="checkbox-all" aria-describedby="checkbox-1" type="checkbox" class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded">
                                <label for="checkbox-all" class="sr-only">checkbox</label>
                            </div>
                        </th>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                            Name
                        </th>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                            Last Name
                        </th>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                            Pôle
                        </th>
                        <th scope="col" class="p-4 text-left text-xs font-medium text-gray-500 uppercase">
                            Rôle
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
