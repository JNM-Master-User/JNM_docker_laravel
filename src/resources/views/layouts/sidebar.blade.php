<aside id="sidebar" class="animate__slideInLeft fixed hidden z-20 h-full top-0 left-0 pt-14 flex lg:flex flex-shrink-0 flex-col w-64 transition-width duration-75 " aria-label="Sidebar">
  <div class="relative flex-1 flex flex-col min-h-0 border-gray-200 bg-white pt-0 dark:text-white dark:bg-gray-700 shadow">
    <div class="flex-1 flex flex-col pt-4 pb-4 overflow-y-auto shadow-lg">
      <div class="flex-1 px-3 bg-white space-y-1 dark:text-white dark:bg-gray-700">
        <div class="pt-2">
          <ul class="pb-2">
            <li>
              <form action="#" method="GET" class="lg:hidden">
                <label for="mobile-search" class="sr-only">Search</label>
                <div class="relative">
                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fa-fw fa-lg fa-solid fa-magnifying-glass text-gray-500 group-hover:text-gray-900 transition duration-75"></i>
                  </div>
                  <input type="text" name="email" id="mobile-search" class=" mb-6 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 block w-full pl-10 p-2" placeholder="Search">
                </div>
              </form>
            </li>
            <x-sidebar.menu>
              <x-icons.acount></x-icons.acount>
              <span class=" flex-1 whitespace-nowrap">{{ __(("Account"))}}</span>
            </x-sidebar.menu>
          </ul>
        </div>
        <div class="pt-4">
          <ul class="pb-2">
            <x-sidebar.menu id="button_menu_toggle_dashboard" class="{{session()->get('content')=='content_dashboard' ? 'bg-gray-100 dark:bg-gray-600' : '' }}">
              <x-icons.dashboard id="icon_menu_toggle_dashboard" class="{{session()->get('content')=='content_dashboard' ? 'text-gray-900 dark:text-gray-200' : '' }}"></x-icons.dashboard>
              <span class=" flex-1 whitespace-nowrap">{{ __("Dashboard") }}</span>
            </x-sidebar.menu>
            <x-sidebar.menu id="button_menu_toggle_users" class="{{session()->get('content')=='content_user' ? 'bg-gray-100 dark:bg-gray-600' : '' }}">
              <x-icons.users id="icon_menu_toggle_users" class="{{session()->get('content')=='content_users' ? 'text-gray-900 dark:text-gray-200' : '' }}"></x-icons.users>
              <span class=" flex-1 whitespace-nowrap">{{ __("Users") }}</span>
            </x-sidebar.menu>
            <x-sidebar.menu id="button_menu_toggle_users_status" class="{{session()->get('content')=='content_status' ? 'bg-gray-100 dark:bg-gray-600' : '' }}">
              <x-icons.users-status id="icon_menu_toggle_users_status" class="{{session()->get('content')=='content_users_status' ? 'text-gray-900 dark:text-gray-200' : '' }}"></x-icons.users-status>
              <span class=" flex-1 whitespace-nowrap">{{ __("Users Status") }}</span>
            </x-sidebar.menu>
            <x-sidebar.menu id="button_menu_toggle_allotments" class="{{session()->get('content')=='content_allotments' ? 'bg-gray-100 dark:bg-gray-600' : '' }}">
              <x-icons.allotments id="icon_menu_toggle_allotments" class="{{session()->get('content')=='content_allotments' ? 'text-gray-900 dark:text-gray-200' : '' }}"></x-icons.allotments>
              <span class=" flex-1 whitespace-nowrap">{{ __("Allotments") }}</span>
            </x-sidebar.menu>
            <x-sidebar.menu id="button_menu_toggle_contacts" class="{{session()->get('content')=='content_contacts' ? 'bg-gray-100 dark:bg-gray-600' : '' }}">
              <x-icons.contacts id="icon_menu_toggle_contacts" class="{{session()->get('content')=='content_contacts' ? 'text-gray-900 dark:text-gray-200' : '' }}"></x-icons.contacts>
              <span class=" flex-1 whitespace-nowrap">{{ __("Contacts") }}</span>
            </x-sidebar.menu>
            <x-sidebar.menu id="button_menu_toggle_events" class="{{session()->get('content')=='content_event' ? 'bg-gray-100 dark:bg-gray-600' : '' }}">
              <x-icons.events id="icon_menu_toggle_events" class="{{session()->get('content')=='content_events' ? 'text-gray-900 dark:text-gray-200' : '' }}"></x-icons.events>
              <span class=" flex-1 whitespace-nowrap">{{ __("Events") }}</span>
            </x-sidebar.menu>
            <x-sidebar.menu id="button_menu_toggle_services" class="{{session()->get('content')=='content_services' ? 'bg-gray-100 dark:bg-gray-600' : '' }}">
              <x-icons.services id="icon_menu_toggle_services" class="{{session()->get('content')=='content_services' ? 'text-gray-900 dark:text-gray-200' : '' }}"></x-icons.services>
              <span class=" flex-1 whitespace-nowrap">{{ __("Services") }}</span>
            </x-sidebar.menu>
            <x-sidebar.menu id="button_menu_toggle_tournaments" class="{{session()->get('content')=='content_tournaments' ? 'bg-gray-100 dark:bg-gray-600' : '' }}">
              <x-icons.tournaments id="icon_menu_toggle_tournaments" class="{{session()->get('content')=='content_tournaments' ? 'text-gray-900 dark:text-gray-200' : '' }}"></x-icons.tournaments>
              <span class=" flex-1 whitespace-nowrap">{{ __("Tournaments") }}</span>
            </x-sidebar.menu>
            <x-sidebar.menu id="button_menu_toggle_transports" class="{{session()->get('content')=='content_transports' ? 'bg-gray-100 dark:bg-gray-600' : '' }}">
              <x-icons.transports id="icon_menu_toggle_transports" class="{{session()->get('content')=='content_transports' ? 'text-gray-900 dark:text-gray-200' : '' }}"></x-icons.transports>
              <span class=" flex-1 whitespace-nowrap">{{ __("Transports") }}</span>
            </x-sidebar.menu>
            <x-sidebar.menu id="button_menu_toggle_roles" class="{{session()->get('content')=='content_roles' ? 'bg-gray-100 dark:bg-gray-600' : '' }}">
              <x-icons.roles id="icon_menu_toggle_roles" class="{{session()->get('content')=='content_roles' ? 'text-gray-900 dark:text-gray-200' : '' }}"></x-icons.roles>
              <span class=" flex-1 whitespace-nowrap">{{ __("Roles") }}</span>
            </x-sidebar.menu>
            <x-sidebar.menu id="button_menu_toggle_partners" class="{{session()->get('content')=='content_partners' ? 'bg-gray-100 dark:bg-gray-600' : '' }}">
              <x-icons.partners id="icon_menu_toggle_partners" class="{{session()->get('content')=='content_partners' ? 'text-gray-900 dark:text-gray-200' : '' }}"></x-icons.partners>
              <span class=" flex-1 whitespace-nowrap">{{ __("Partners") }}</span>
            </x-sidebar.menu>
            <x-sidebar.menu id="button_menu_toggle_poles" class="{{session()->get('content')=='content_poles' ? 'bg-gray-100 dark:bg-gray-600' : '' }}">
              <x-icons.poles id="icon_menu_toggle_poles" class="{{session()->get('content')=='content_poles' ? 'text-gray-900 dark:text-gray-200' : '' }}"></x-icons.poles>
              <span class=" flex-1 whitespace-nowrap">{{__("Poles")}}</span>
            </x-sidebar.menu>
            <x-sidebar.menu id="button_menu_toggle_institutions" class="{{session()->get('content')=='content_institutions' ? 'bg-gray-100 dark:bg-gray-600' : '' }}">
              <x-icons.institutions id="icon_menu_toggle_institutions" class="{{session()->get('content')=='content_institutions' ? 'text-gray-900 dark:text-gray-200' : '' }}"></x-icons.institutions>
              <span class=" flex-1 whitespace-nowrap">{{__("Institutions")}}</span>
            </x-sidebar.menu>
          </ul>
        </div>
        <div class="pt-4">
          <ul class="pb-2">
          </ul>
          <x-sidebar.menu id="button_menu_toggle_test" class="{{session()->get('content')=='content_test' ? 'bg-gray-100 dark:bg-gray-600' : '' }}">
            <span class=" flex-1 whitespace-nowrap">{{__("test")}}</span>
          </x-sidebar.menu>
          <x-sidebar.menu id="button_menu_toggle_test" class="{{session()->get('content')=='content_test' ? 'bg-gray-100 dark:bg-gray-600' : '' }}">
            <span class=" flex-1 whitespace-nowrap">{{__("test")}}</span>
          </x-sidebar.menu>
          <x-sidebar.menu id="button_menu_toggle_test" class="{{session()->get('content')=='content_test' ? 'bg-gray-100 dark:bg-gray-600' : '' }}">
            <span class=" flex-1 whitespace-nowrap">{{__("test")}}</span>
          </x-sidebar.menu>
          <x-sidebar.menu id="button_menu_toggle_test" class="{{session()->get('content')=='content_test' ? 'bg-gray-100 dark:bg-gray-600' : '' }}">
            <span class=" flex-1 whitespace-nowrap">{{__("test")}}</span>
          </x-sidebar.menu>
          <x-sidebar.menu id="button_menu_toggle_test" class="{{session()->get('content')=='content_test' ? 'bg-gray-100 dark:bg-gray-600' : '' }}">
            <span class=" flex-1 whitespace-nowrap">{{__("test")}}</span>
          </x-sidebar.menu>
          <x-sidebar.menu id="button_menu_toggle_test" class="{{session()->get('content')=='content_test' ? 'bg-gray-100 dark:bg-gray-600' : '' }}">
            <span class=" flex-1 whitespace-nowrap">{{__("test")}}</span>
          </x-sidebar.menu>
        </div>
        <div class="pt-4">
          <ul class="pb-2">
            <x-sidebar.menu id="button_menu_toggle_pictures" class="{{session()->get('content')=='content_pictures' ? 'bg-gray-100 dark:bg-gray-600' : '' }}">
              <x-icons.pictures id="icon_menu_toggle_pictures" class="{{session()->get('content')=='content_pictures' ? 'text-gray-900 dark:text-gray-200' : '' }}"></x-icons.pictures>
              <span class=" flex-1 whitespace-nowrap">{{__("Pictures")}}</span>
            </x-sidebar.menu>
            <x-sidebar.menu id="button_menu_toggle_videos" class="{{session()->get('content')=='content_videos' ? 'bg-gray-100 dark:bg-gray-600' : '' }}">
              <x-icons.videos id="icon_menu_toggle_videos" class="{{session()->get('content')=='content_videos' ? 'text-gray-900 dark:text-gray-200' : '' }}"></x-icons.videos>
              <span class=" flex-1 whitespace-nowrap">{{ __("Videos") }}</span>
            </x-sidebar.menu>
          </ul>
        </div>
      </div>
    </div>
  </div>
</aside>

<div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>
