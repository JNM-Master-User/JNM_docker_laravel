<aside id="sidebar" class="animate__slideInLeft fixed hidden z-20 h-full top-0 left-0 pt-16 flex lg:flex flex-shrink-0 flex-col w-64 transition-width duration-75" aria-label="Sidebar">
  <div class="relative flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white pt-0">
    <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
      <div class="flex-1 px-3 bg-white divide-y space-y-1">
        <div class="pt-2">
          <ul class="pb-2">
            <li>
              <form action="#" method="GET" class="lg:hidden">
                <label for="mobile-search" class="sr-only">Search</label>
                <div class="relative">
                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fa-fw fa-lg fa-solid fa-magnifying-glass text-gray-500 group-hover:text-gray-900 transition duration-75"></i>
                  </div>
                  <input type="text" name="email" id="mobile-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-600 focus:ring-cyan-600 block w-full pl-10 p-2.5" placeholder="Search">
                </div>
              </form>
            </li>
            <x-sidebar.menu>
              <x-icons.acount class="{{session()->get('content')=='content_acount' ? 'text-gray-900' : '' }}"></x-icons.acount>
              <span class=" flex-1 whitespace-nowrap">{{ __(("Account"))}}</span>
            </x-sidebar.menu>
          </ul>
        </div>
        <div class="pt-4">
          <ul class="pb-2">
            <x-sidebar.menu id="button_menu_toggle_dashboard" class="{{session()->get('content')=='content_dashboard' ? 'bg-gray-100' : '' }}">
              <x-icons.dashboard class="{{session()->get('content')=='content_dashboard' ? 'text-gray-900' : '' }}"></x-icons.dashboard>
              <span class=" flex-1 whitespace-nowrap">{{ __("Dashboard") }}</span>
            </x-sidebar.menu>
            <x-sidebar.menu id="button_menu_toggle_users" class="{{session()->get('content')=='content_user' ? 'bg-gray-100' : '' }}">
              <x-icons.users class="{{session()->get('content')=='content_users' ? 'text-gray-900' : '' }}"></x-icons.users>
              <span class=" flex-1 whitespace-nowrap">{{ __("Users") }}</span>
            </x-sidebar.menu>
            <x-sidebar.menu id="button_menu_toggle_users_status" class="{{session()->get('content')=='content_status' ? 'bg-gray-100' : '' }}">
              <x-icons.users-status class="{{session()->get('content')=='content_users_status' ? 'text-gray-900' : '' }}"></x-icons.users-status>
              <span class=" flex-1 whitespace-nowrap">{{ __("Users Status") }}</span>
            </x-sidebar.menu>
            <x-sidebar.menu id="button_menu_toggle_allotments" class="{{session()->get('content')=='content_allotments' ? 'bg-gray-100' : '' }}">
              <x-icons.allotments class="{{session()->get('content')=='content_allotments' ? 'text-gray-900' : '' }}"></x-icons.allotments>
              <span class=" flex-1 whitespace-nowrap">{{ __("Allotments") }}</span>
            </x-sidebar.menu>
            <x-sidebar.menu id="button_menu_toggle_contacts" class="{{session()->get('content')=='content_contacts' ? 'bg-gray-100' : '' }}">
              <x-icons.contacts class="{{session()->get('content')=='content_contacts' ? 'text-gray-900' : '' }}"></x-icons.contacts>
              <span class=" flex-1 whitespace-nowrap">{{ __("Contacts") }}</span>
            </x-sidebar.menu>
            <x-sidebar.menu id="button_menu_toggle_events" class="{{session()->get('content')=='content_event' ? 'bg-gray-100' : '' }}">
              <x-icons.events class="{{session()->get('content')=='content_events' ? 'text-gray-900' : '' }}"></x-icons.events>
              <span class=" flex-1 whitespace-nowrap">{{ __("Events") }}</span>
            </x-sidebar.menu>
            <x-sidebar.menu id="button_menu_toggle_services" class="{{session()->get('content')=='content_services' ? 'bg-gray-100' : '' }}">
              <x-icons.services class="{{session()->get('content')=='content_services' ? 'text-gray-900' : '' }}"></x-icons.services>
              <span class=" flex-1 whitespace-nowrap">{{ __("Services") }}</span>
            </x-sidebar.menu>
            <x-sidebar.menu id="button_menu_toggle_tournaments" class="{{session()->get('content')=='content_tournaments' ? 'bg-gray-100' : '' }}">
              <x-icons.tournaments class="{{session()->get('content')=='content_tournaments' ? 'text-gray-900' : '' }}"></x-icons.tournaments>
              <span class=" flex-1 whitespace-nowrap">{{ __("Tournaments") }}</span>
            </x-sidebar.menu>
            <x-sidebar.menu id="button_menu_toggle_transports" class="{{session()->get('content')=='content_transports' ? 'bg-gray-100' : '' }}">
              <x-icons.transports class="{{session()->get('content')=='content_transports' ? 'text-gray-900' : '' }}"></x-icons.transports>
              <span class=" flex-1 whitespace-nowrap">{{ __("Transports") }}</span>
            </x-sidebar.menu>
            <x-sidebar.menu id="button_menu_toggle_roles" class="{{session()->get('content')=='content_roles' ? 'bg-gray-100' : '' }}">
              <x-icons.roles class="{{session()->get('content')=='content_roles' ? 'text-gray-900' : '' }}"></x-icons.roles>
              <span class=" flex-1 whitespace-nowrap">{{ __("Roles") }}</span>
            </x-sidebar.menu>
            <x-sidebar.menu id="button_menu_toggle_partners" class="{{session()->get('content')=='content_partners' ? 'bg-gray-100' : '' }}">
              <x-icons.partners class="{{session()->get('content')=='content_partners' ? 'text-gray-900' : '' }}"></x-icons.partners>
              <span class=" flex-1 whitespace-nowrap">{{ __("Partners") }}</span>
            </x-sidebar.menu>
            <x-sidebar.menu id="button_menu_toggle_poles" class="{{session()->get('content')=='content_poles' ? 'bg-gray-100' : '' }}">
              <x-icons.poles class="{{session()->get('content')=='content_poles' ? 'text-gray-900' : '' }}"></x-icons.poles>
              <span class=" flex-1 whitespace-nowrap">{{__("Poles")}}</span>
            </x-sidebar.menu>
            <x-sidebar.menu id="button_menu_toggle_institutions" class="{{session()->get('content')=='content_institutions' ? 'bg-gray-100' : '' }}">
              <x-icons.institutions class="{{session()->get('content')=='content_institutions' ? 'text-gray-900' : '' }}"></x-icons.institutions>
              <span class=" flex-1 whitespace-nowrap">{{__("Institutions")}}</span>
            </x-sidebar.menu>
          </ul>
        </div>
        <div class="pt-4">
          <ul class="pb-2">
          </ul>
          <x-sidebar.menu id="button_menu_toggle_test" class="{{session()->get('content')=='content_test' ? 'bg-gray-100' : '' }}">
            <span class=" flex-1 whitespace-nowrap">{{__("test")}}</span>
          </x-sidebar.menu>
          <x-sidebar.menu id="button_menu_toggle_test" class="{{session()->get('content')=='content_test' ? 'bg-gray-100' : '' }}">
            <span class=" flex-1 whitespace-nowrap">{{__("test")}}</span>
          </x-sidebar.menu>
          <x-sidebar.menu id="button_menu_toggle_test" class="{{session()->get('content')=='content_test' ? 'bg-gray-100' : '' }}">
            <span class=" flex-1 whitespace-nowrap">{{__("test")}}</span>
          </x-sidebar.menu>
          <x-sidebar.menu id="button_menu_toggle_test" class="{{session()->get('content')=='content_test' ? 'bg-gray-100' : '' }}">
            <span class=" flex-1 whitespace-nowrap">{{__("test")}}</span>
          </x-sidebar.menu>
          <x-sidebar.menu id="button_menu_toggle_test" class="{{session()->get('content')=='content_test' ? 'bg-gray-100' : '' }}">
            <span class=" flex-1 whitespace-nowrap">{{__("test")}}</span>
          </x-sidebar.menu>
          <x-sidebar.menu id="button_menu_toggle_test" class="{{session()->get('content')=='content_test' ? 'bg-gray-100' : '' }}">
            <span class=" flex-1 whitespace-nowrap">{{__("test")}}</span>
          </x-sidebar.menu>
        </div>
        <div class="pt-4">
          <ul class="pb-2">
            <x-sidebar.menu>
              <x-icons.pictures class="{{session()->get('content')=='content_pictures' ? 'text-gray-900' : '' }}"></x-icons.pictures>
              <span class="ml-3 flex-1 whitespace-nowrap">{{__("Pictures")}}</span>
            </x-sidebar.menu>
            <x-sidebar.menu id="button_menu_toggle_videos" class="{{session()->get('content')=='content_videos' ? 'bg-gray-100' : '' }}">
              <x-icons.videos class="{{session()->get('content')=='content_videos' ? 'text-gray-900' : '' }}"></x-icons.videos>
              <span class=" flex-1 whitespace-nowrap">{{ __("Videos") }}</span>
            </x-sidebar.menu>
          </ul>
        </div>
      </div>
    </div>
  </div>
</aside>

<div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>
