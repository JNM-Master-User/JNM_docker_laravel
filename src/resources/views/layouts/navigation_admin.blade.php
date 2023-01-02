<nav class="bg-white shadow-lg fixed z-30 w-full dark:text-white dark:bg-gray-700 dark:border-gray-600">
    <div class="px-3 py-2 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <button id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar" class="lg:hidden mr-2 cursor-pointer p-2 rounded">
                    <svg id="toggleSidebarMobileHamburger" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                    <svg id="toggleSidebarMobileClose" class="w-6 h-6 hidden" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                <a href="{{ route('dashboard.accueil') }}" class="text-xl font-bold flex items-center lg:ml-2.5">
                    <x-application-logo class="block fill-current text-gray-600 h-6 mr-2" >
                    </x-application-logo>
                </a>
            </div>
            <div class="flex items-center">
                <button id="toggleSidebarMobileSearch" type="button" class="lg:hidden text-gray-500 hover:text-gray-900 hover:bg-gray-100 p-2 rounded-lg">
                </button>
                <x-buttons.dark-theme-toggle-button>
                </x-buttons.dark-theme-toggle-button>
                <form method="GET" action="{{ route('accueil') }}">
                    @csrf
                    <x-buttons.link-button class="my-2 mr-2 ml-2" name="{{ __('Home') }}"></x-buttons.link-button>
                </form>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-buttons.form-button class="my-2 mr-2 ml-2" name="{{ __('Log Out') }}"></x-buttons.form-button>
                </form>
            </div>
        </div>
    </div>
</nav>