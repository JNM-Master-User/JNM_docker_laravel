<aside id="sidebar" class="animate__slideInLeft fixed hidden z-20 h-full top-0 left-0 pt-16 flex lg:flex flex-shrink-0 flex-col w-64 transition-width duration-75" aria-label="Sidebar">
  <div class="relative flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white pt-0">
    <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
      <div class="flex-1 px-3 bg-white divide-y space-y-1">
        <ul class="space-y-2 pb-2">
          <li>
            <form action="#" method="GET" class="lg:hidden">
              <label for="mobile-search" class="sr-only">Search</label>
              <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                </div>
                <input type="text" name="email" id="mobile-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-600 focus:ring-cyan-600 block w-full pl-10 p-2.5" placeholder="Search">
              </div>
            </form>
          </li>
          <x-sidebar.menu>
            <span class="ml-3 flex-1 whitespace-nowrap">{{ Auth::user()->email }}</span>
          </x-sidebar.menu>
          <x-sidebar.menu id="button_menu_toggle_dashboard">
            <x-icons.dashboard></x-icons.dashboard>
            <span class="ml-3 flex-1 whitespace-nowrap">{{ __("Dashboard") }}</span>
          </x-sidebar.menu>
          <x-sidebar.menu id="button_menu_toggle_roles">
            <x-icons.partners></x-icons.partners>
            <span class="ml-3 flex-1 whitespace-nowrap">{{ __("Roles") }}</span>
          </x-sidebar.menu>
          <x-sidebar.menu id="button_menu_toggle_users">
            <x-icons.users></x-icons.users>
            <span class="ml-3 flex-1 whitespace-nowrap">{{ __("Users") }}</span>
          </x-sidebar.menu>
          <x-sidebar.menu id="button_menu_toggle_partners">
            <x-icons.partners></x-icons.partners>
            <span class="ml-3 flex-1 whitespace-nowrap">{{ __("Partners") }}</span>
          </x-sidebar.menu>
          <x-sidebar.menu id="button_menu_toggle_transports">
            <x-icons.transports></x-icons.transports>
            <span class="ml-3 flex-1 whitespace-nowrap">{{__("Transports")}}</span>
          </x-sidebar.menu>
          <x-sidebar.menu id="button_menu_toggle_poles">
            <x-icons.poles></x-icons.poles>
            <span class="ml-3 flex-1 whitespace-nowrap">{{__("Poles")}}</span>
          </x-sidebar.menu>
            <x-sidebar.menu id="button_menu_toggle_institutions">
                <x-icons.institutions></x-icons.institutions>
                <span class="ml-3 flex-1 whitespace-nowrap">{{__("Institutions")}}</span>
            </x-sidebar.menu>
        </ul>
        <div class="space-y-2 pt-2">
          <ul class="space-y-2 pb-2">
            <x-sidebar.menu>
              <x-icons.pictures></x-icons.pictures>
              <span class="ml-3 flex-1 whitespace-nowrap">{{__("Pictures")}}</span>
            </x-sidebar.menu>
          </ul>
        </div>
      </div>
    </div>
  </div>
</aside>

<div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>
