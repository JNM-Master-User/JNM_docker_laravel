<div class=" bg-white dark:bg-gray-700 sm:flex items-center">
    <div class="sm:flex">
        <div class=" sm:flex items-center mb-3 sm:mb-0">
            <div class="flex inline-flex items-center mr-4">
                <label class="sr-only">{{__('Select All')}}</label>
                <input type="checkbox" class="bg-gray-50 focus:ring-3 focus:ring-cyan-200 h-4 w-4 rounded">
            </div>
            <form action="#" method="GET">
                <label for="topbar-search" class="sr-only">{{$search?? ''}}</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                    </div>
                    <input type="text" name="email" id="search{{$search?? ''}}" class="text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 block w-full pl-10 p-2" placeholder="{{$search?? ''}}">
                </div>
            </form>
            <div class="ml-3">
                <x-buttons.form-button>
                    <x-icons.trash></x-icons.trash>
                </x-buttons.form-button>
            </div>
        </div>
    </div>
</div>