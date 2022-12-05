<x-app-layout>
    <x-content.home id="content_dashboard" class="{{session()->get('content')=='content_dashboard' ? 'shown' : 'hidden' }}">
    </x-content.home>
    <x-content.users :users="$data['users']" id="content_users" class="{{session()->get('content')=='content_user' ? 'shown' : 'hidden' }}">
    </x-content.users>
    <x-content.roles :roles="$data['roles']" id="content_roles" class="{{session()->get('content')=='content_roles' ? 'shown' : 'hidden' }}">
    </x-content.roles>
    <x-content.poles :poles="$data['poles']" id="content_poles" class="{{session()->get('content')=='content_poles' ? 'shown' : 'hidden'  }}">
    </x-content.poles>
    <x-content.partners :partners="$data['partners']" id="content_partners" class="{{session()->get('content')=='content_partners' ? 'shown' : 'hidden'  }}">
    </x-content.partners>
    <x-content.transports :transports="$data['transports']" id="content_transports" class="{{session()->get('content')=='content_transports' ? 'shown' : 'hidden'  }}">
    </x-content.transports>
    <x-content.institutions :institutions="$data['institutions']" id="content_institutions" class="{{session()->get('content')=='content_institutions' ? 'shown' : 'hidden'  }}">
    </x-content.institutions>
    <x-content.services :services="$data['services']" id="content_services" class="{{session()->get('content')=='content_services' ? 'shown' : 'hidden'  }}">
    </x-content.services>
    <x-content.tournaments :tournaments="$data['tournaments']" id="content_tournaments" class="{{session()->get('content')=='content_tournaments' ? 'shown' : 'hidden'  }}">
    </x-content.tournaments>
    <x-content.videos :videos="$data['videos']" id="content_videos" class="{{session()->get('content')=='content_videos' ? 'shown' : 'hidden'  }}">
    </x-content.videos>
    <x-content.users_status :usersStatus="$data['users_status']" id="content_users_status" class="{{session()->get('content')=='content_users_status' ? 'shown' : 'hidden'  }}">
    </x-content.users_status>
    <x-content.allotments :allotments="$data['allotments']" id="content_allotments" class="{{session()->get('content')=='content_allotments' ? 'shown' : 'hidden'  }}">
    </x-content.allotments>
    <x-content.contacts :contacts="$data['contacts']" :poles="$data['poles']" :roles="$data['roles']" id="content_contacts" class="{{session()->get('content')=='content_contacts' ? 'shown' : 'hidden'  }}">
    </x-content.contacts>
    <x-content.events :events="$data['events']" :institutions="$data['institutions']" id="content_events" class="{{session()->get('content')=='content_events' ? 'shown' : 'hidden'  }}">
    </x-content.events>

    <script type="text/javascript">
        const button_menu_toggle_dashboard = document.getElementById('button_menu_toggle_dashboard');
        const button_menu_toggle_users = document.getElementById('button_menu_toggle_users');
        const button_menu_toggle_roles = document.getElementById('button_menu_toggle_roles');
        const button_menu_toggle_partners = document.getElementById('button_menu_toggle_partners');
        const button_menu_toggle_transports = document.getElementById('button_menu_toggle_transports');
        const button_menu_toggle_poles = document.getElementById('button_menu_toggle_poles');
        const button_menu_toggle_institutions = document.getElementById('button_menu_toggle_institutions');
        const button_menu_toggle_services = document.getElementById('button_menu_toggle_services');
        const button_menu_toggle_tournaments = document.getElementById('button_menu_toggle_tournaments');
        const button_menu_toggle_videos = document.getElementById('button_menu_toggle_videos');
        const button_menu_toggle_users_status = document.getElementById('button_menu_toggle_users_status');
        const button_menu_toggle_allotments = document.getElementById('button_menu_toggle_allotments');
        const button_menu_toggle_contacts = document.getElementById('button_menu_toggle_contacts');
        const button_menu_toggle_events = document.getElementById('button_menu_toggle_events');

        const icon_menu_toggle_dashboard = document.getElementById('icon_menu_toggle_dashboard');
        const icon_menu_toggle_users = document.getElementById('icon_menu_toggle_users');
        const icon_menu_toggle_roles = document.getElementById('icon_menu_toggle_roles');
        const icon_menu_toggle_partners = document.getElementById('icon_menu_toggle_partners');
        const icon_menu_toggle_transports = document.getElementById('icon_menu_toggle_transports');
        const icon_menu_toggle_poles = document.getElementById('icon_menu_toggle_poles');
        const icon_menu_toggle_institutions = document.getElementById('icon_menu_toggle_institutions');
        const icon_menu_toggle_services = document.getElementById('icon_menu_toggle_services');
        const icon_menu_toggle_tournaments = document.getElementById('icon_menu_toggle_tournaments');
        const icon_menu_toggle_videos = document.getElementById('icon_menu_toggle_videos');
        const icon_menu_toggle_users_status = document.getElementById('icon_menu_toggle_users_status');
        const icon_menu_toggle_allotments = document.getElementById('icon_menu_toggle_allotments');
        const icon_menu_toggle_contacts = document.getElementById('icon_menu_toggle_contacts');
        const icon_menu_toggle_events = document.getElementById('icon_menu_toggle_events');

        const content_dashboard = document.getElementById('content_dashboard');
        const content_users = document.getElementById('content_users');
        const content_roles = document.getElementById('content_roles');
        const content_partners = document.getElementById('content_partners');
        const content_transports = document.getElementById('content_transports');
        const content_poles = document.getElementById('content_poles');
        const content_institutions = document.getElementById('content_institutions');
        const content_services = document.getElementById('content_services');
        const content_tournaments = document.getElementById('content_tournaments');
        const content_videos = document.getElementById('content_videos');
        const content_users_status = document.getElementById('content_users_status');
        const content_allotments = document.getElementById('content_allotments');
        const content_contacts = document.getElementById('content_contacts');
        const content_events = document.getElementById('content_events');


        const show = (element) =>{
            element.classList.remove('hidden');
            element.classList.add('shown');
        }
        const selected_menu = (element) =>{
            element.classList.add('bg-gray-100','dark:bg-gray-600');
        }
        const selected_icon = (element) =>{
            element.classList.add('text-gray-900','dark:text-gray-200');
        }

        const reset = () =>{
            content_users.classList.remove('shown', 'hidden');
            content_roles.classList.remove('shown', 'hidden');
            content_partners.classList.remove('shown','hidden');
            content_transports.classList.remove('shown','hidden');
            content_dashboard.classList.remove('shown','hidden');
            content_poles.classList.remove('shown','hidden');
            content_institutions.classList.remove('shown','hidden');
            content_services.classList.remove('shown','hidden');
            content_tournaments.classList.remove('shown','hidden');
            content_videos.classList.remove('shown','hidden');
            content_users_status.classList.remove('shown','hidden');
            content_allotments.classList.remove('shown','hidden');
            content_contacts.classList.remove('shown','hidden');
            content_events.classList.remove('shown','hidden');

            content_users.classList.add('hidden');
            content_roles.classList.add('hidden');
            content_partners.classList.add('hidden');
            content_transports.classList.add('hidden');
            content_dashboard.classList.add('hidden');
            content_poles.classList.add('hidden');
            content_institutions.classList.add('hidden');
            content_services.classList.add('hidden');
            content_tournaments.classList.add('hidden');
            content_videos.classList.add('hidden');
            content_users_status.classList.add('hidden');
            content_allotments.classList.add('hidden');
            content_contacts.classList.add('hidden');
            content_events.classList.add('hidden');

            button_menu_toggle_users.classList.remove('bg-gray-100','dark:bg-gray-600');
            button_menu_toggle_roles.classList.remove('bg-gray-100','dark:bg-gray-600');
            button_menu_toggle_partners.classList.remove('bg-gray-100','dark:bg-gray-600');
            button_menu_toggle_transports.classList.remove('bg-gray-100','dark:bg-gray-600');
            button_menu_toggle_dashboard.classList.remove('bg-gray-100','dark:bg-gray-600');
            button_menu_toggle_poles.classList.remove('bg-gray-100','dark:bg-gray-600');
            button_menu_toggle_institutions.classList.remove('bg-gray-100','dark:bg-gray-600');
            button_menu_toggle_services.classList.remove('bg-gray-100','dark:bg-gray-600');
            button_menu_toggle_tournaments.classList.remove('bg-gray-100','dark:bg-gray-600');
            button_menu_toggle_videos.classList.remove('bg-gray-100','dark:bg-gray-600');
            button_menu_toggle_users_status.classList.remove('bg-gray-100','dark:bg-gray-600');
            button_menu_toggle_allotments.classList.remove('bg-gray-100','dark:bg-gray-600');
            button_menu_toggle_contacts.classList.remove('bg-gray-100','dark:bg-gray-600');
            button_menu_toggle_events.classList.remove('bg-gray-100','dark:bg-gray-600');

            icon_menu_toggle_dashboard.classList.remove('text-gray-900','dark:text-gray-200');
            icon_menu_toggle_users.classList.remove('text-gray-900','dark:text-gray-200');
            icon_menu_toggle_roles.classList.remove('text-gray-900','dark:text-gray-200');
            icon_menu_toggle_partners.classList.remove('text-gray-900','dark:text-gray-200');
            icon_menu_toggle_transports.classList.remove('text-gray-900','dark:text-gray-200');
            icon_menu_toggle_poles.classList.remove('text-gray-900','dark:text-gray-200');
            icon_menu_toggle_institutions.classList.remove('text-gray-900','dark:text-gray-200');
            icon_menu_toggle_services.classList.remove('text-gray-900','dark:text-gray-200');
            icon_menu_toggle_tournaments.classList.remove('text-gray-900','dark:text-gray-200');
            icon_menu_toggle_videos.classList.remove('text-gray-900','dark:text-gray-200');
            icon_menu_toggle_users_status.classList.remove('text-gray-900','dark:text-gray-200');
            icon_menu_toggle_allotments.classList.remove('text-gray-900','dark:text-gray-200');
            icon_menu_toggle_contacts.classList.remove('text-gray-900','dark:text-gray-200');
            icon_menu_toggle_events.classList.remove('text-gray-900','dark:text-gray-200');
        }

        button_menu_toggle_dashboard.addEventListener('click', () => {
            reset();
            show(content_dashboard);
            selected_menu(button_menu_toggle_dashboard);
            selected_icon(icon_menu_toggle_dashboard);
        });
        button_menu_toggle_users.addEventListener('click', () => {
            reset();
            show(content_users);
            selected_menu(button_menu_toggle_users);
            selected_icon(icon_menu_toggle_users);
        });
        button_menu_toggle_roles.addEventListener('click', () => {
            reset();
            show(content_roles);
            selected_menu(button_menu_toggle_roles);
            selected_icon(icon_menu_toggle_roles);
        });
        button_menu_toggle_partners.addEventListener('click', () => {
            reset();
            show(content_partners);
            selected_menu(button_menu_toggle_partners);
            selected_icon(icon_menu_toggle_partners);
        });
        button_menu_toggle_transports.addEventListener('click', () => {
            reset();
            show(content_transports);
            selected_menu(button_menu_toggle_transports);
            selected_icon(icon_menu_toggle_transports);
        });
        button_menu_toggle_poles.addEventListener('click', () => {
            reset();
            show(content_poles);
            selected_menu(button_menu_toggle_poles);
            selected_icon(icon_menu_toggle_poles);
        });
        button_menu_toggle_institutions.addEventListener('click', () => {
            reset();
            show(content_institutions);
            selected_menu(button_menu_toggle_institutions);
            selected_icon(icon_menu_toggle_institutions);
        });
        button_menu_toggle_services.addEventListener('click', () => {
            reset();
            show(content_services);
            selected_menu(button_menu_toggle_services);
            selected_icon(icon_menu_toggle_services);
        })
        button_menu_toggle_tournaments.addEventListener('click', () => {
            reset();
            show(content_tournaments);
            selected_menu(button_menu_toggle_tournaments);
            selected_icon(icon_menu_toggle_tournaments);
        })
        button_menu_toggle_videos.addEventListener('click', () => {
            reset();
            show(content_videos);
            selected_menu(button_menu_toggle_videos);
            selected_icon(icon_menu_toggle_videos);
        })
        button_menu_toggle_users_status.addEventListener('click', () => {
            reset();
            show(content_users_status);
            selected_menu(button_menu_toggle_users_status);
            selected_icon(icon_menu_toggle_users_status);
        });
        button_menu_toggle_allotments.addEventListener('click', () => {
            reset();
            show(content_allotments);
            selected_menu(button_menu_toggle_allotments);
            selected_icon(icon_menu_toggle_allotments);
        });
        button_menu_toggle_contacts.addEventListener('click', () => {
            reset();
            show(content_contacts);
            selected_menu(button_menu_toggle_contacts);
            selected_icon(icon_menu_toggle_contacts);
        });
        button_menu_toggle_events.addEventListener('click', () => {
            reset();
            show(content_events);
            selected_menu(button_menu_toggle_events);
            selected_icon(icon_menu_toggle_events);
        });
    </script>
</x-app-layout>
