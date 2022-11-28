<x-app-layout>
    <x-content.home id="content_dashboard" class="{{isset($content_dashboard) ? 'shown' : 'hidden' }}">
    </x-content.home>
    <x-content.users :users="$data['users']" id="content_users" class="{{isset($content_users) ? 'shown' : 'hidden' }}">
    </x-content.users>
    <x-content.roles :roles="$data['roles']" id="content_roles" class="{{isset($content_roles) ? 'shown' : 'hidden' }}">
    </x-content.roles>
    <x-content.poles :poles="$data['poles']" id="content_poles" class="{{isset($content_poles) ? 'shown' : 'hidden'  }}">
    </x-content.poles>
    <x-content.partners :partners="$data['partners']" id="content_partners" class="{{isset($content_partners) ? 'shown' : 'hidden'  }}">
    </x-content.partners>
    <x-content.transports :transports="$data['transports']" id="content_transports" class="{{isset($content_transports) ? 'shown' : 'hidden'  }}">
    </x-content.transports>
    <x-content.institutions :institutions="$data['institutions']" id="content_institutions" class="{{isset($content_institutions) ? 'shown' : 'hidden'  }}">
    </x-content.institutions>
    <x-content.users_status :usersStatus="$data['users_status']" id="content_users_status" class="{{isset($content_users_status) ? 'shown' : 'hidden'  }}">
    </x-content.users_status>
    <x-content.allotments :allotments="$data['allotments']" id="content_allotments" class="{{isset($content_allotments) ? 'shown' : 'hidden'  }}">
    </x-content.allotments>
    <x-content.contacts :contacts="$data['contacts']" :poles="$data['poles']" :roles="$data['roles']" id="content_contacts" class="{{isset($content_contacts) ? 'shown' : 'hidden'  }}">
    </x-content.contacts>
    <x-content.events :events="$data['events']" id="content_events" class="{{isset($content_events) ? 'shown' : 'hidden'  }}">
    </x-content.events>

    <script type="text/javascript">
        const button_menu_toggle_dashboard = document.getElementById('button_menu_toggle_dashboard');
        const button_menu_toggle_users = document.getElementById('button_menu_toggle_users');
        const button_menu_toggle_roles = document.getElementById('button_menu_toggle_roles');
        const button_menu_toggle_partners = document.getElementById('button_menu_toggle_partners');
        const button_menu_toggle_transports = document.getElementById('button_menu_toggle_transports');
        const button_menu_toggle_poles = document.getElementById('button_menu_toggle_poles');
        const button_menu_toggle_institutions = document.getElementById('button_menu_toggle_institutions');
        const button_menu_toggle_users_status = document.getElementById('button_menu_toggle_users_status');
        const button_menu_toggle_allotments = document.getElementById('button_menu_toggle_allotments');
        const button_menu_toggle_contacts = document.getElementById('button_menu_toggle_contacts');
        const button_menu_toggle_events = document.getElementById('button_menu_toggle_events');

        const content_dashboard = document.getElementById('content_dashboard');
        const content_users = document.getElementById('content_users');
        const content_roles = document.getElementById('content_roles');
        const content_partners = document.getElementById('content_partners');
        const content_transports = document.getElementById('content_transports');
        const content_poles = document.getElementById('content_poles');
        const content_institutions = document.getElementById('content_institutions');
        const content_users_status = document.getElementById('content_users_status');
        const content_allotments = document.getElementById('content_allotments');
        const content_contacts = document.getElementById('content_contacts');
        const content_events = document.getElementById('content_events');


        const show = (element) =>{
            element.classList.remove('hidden');
            element.classList.add('shown');
        }
        const reset = () =>{
            content_users.classList.remove('shown', 'hidden');
            content_roles.classList.remove('shown', 'hidden');
            content_partners.classList.remove('shown','hidden');
            content_transports.classList.remove('shown','hidden');
            content_dashboard.classList.remove('shown','hidden');
            content_poles.classList.remove('shown','hidden');
            content_institutions.classList.remove('shown','hidden');
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
            content_users_status.classList.add('hidden');
            content_allotments.classList.add('hidden');
            content_contacts.classList.add('hidden');
            content_events.classList.add('hidden');
        }

        button_menu_toggle_dashboard.addEventListener('click', () => {
            reset();
            show(content_dashboard);
        });
        button_menu_toggle_users.addEventListener('click', () => {
            reset();
            show(content_users);
        });
        button_menu_toggle_roles.addEventListener('click', () => {
            reset();
            show(content_roles);
        });
        button_menu_toggle_partners.addEventListener('click', () => {
            reset();
            show(content_partners);
        });
        button_menu_toggle_transports.addEventListener('click', () => {
            reset();
            show(content_transports);
        });
        button_menu_toggle_poles.addEventListener('click', () => {
            reset();
            show(content_poles);
        });
        button_menu_toggle_institutions.addEventListener('click', () => {
            reset();
            show(content_institutions);
        });
        button_menu_toggle_users_status.addEventListener('click', () => {
            reset();
            show(content_users_status);
        });
        button_menu_toggle_allotments.addEventListener('click', () => {
            reset();
            show(content_allotments);
        });
        button_menu_toggle_contacts.addEventListener('click', () => {
            reset();
            show(content_contacts);
        });
        button_menu_toggle_events.addEventListener('click', () => {
            reset();
            show(content_events);
        });
    </script>
</x-app-layout>
