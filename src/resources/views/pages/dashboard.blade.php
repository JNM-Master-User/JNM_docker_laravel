<x-app-layout>
    <x-content.home id="content_dashboard" class="{{isset($content_dashboard) ? 'shown' : 'hidden' }}">
    </x-content.home>
    <x-content.roles id="content_roles" class="{{isset($content_roles) ? 'shown' : 'hidden' }}">
    </x-content.roles>
    <x-content.users id="content_users" class="{{isset($content_users) ? 'shown' : 'hidden' }}">
    </x-content.users>
    <x-content.partners id="content_partners" class="{{isset($content_partners) ? 'shown' : 'hidden'  }}">
    </x-content.partners>
    <x-content.transports id="content_transports" class="{{isset($content_transports) ? 'shown' : 'hidden'  }}">
    </x-content.transports>
    <x-content.poles id="content_poles" class="{{isset($content_poles) ? 'shown' : 'hidden'  }}">
    </x-content.poles>
    <script type="text/javascript">
        const button_menu_toggle_dashboard = document.getElementById('button_menu_toggle_dashboard');
        const button_menu_toggle_users = document.getElementById('button_menu_toggle_users');
        const button_menu_toggle_roles = document.getElementById('button_menu_toggle_roles');
        const button_menu_toggle_partners = document.getElementById('button_menu_toggle_partners');
        const button_menu_toggle_transports = document.getElementById('button_menu_toggle_transports');
        const button_menu_toggle_poles = document.getElementById('button_menu_toggle_poles');

        const content_dashboard = document.getElementById('content_dashboard');
        const content_users = document.getElementById('content_users');
        const content_roles = document.getElementById('content_roles');
        const content_partners = document.getElementById('content_partners');
        const content_transports = document.getElementById('content_transports');
        const content_poles = document.getElementById('content_poles');


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
            content_users.classList.add('hidden');
            content_roles.classList.add('hidden');
            content_partners.classList.add('hidden');
            content_transports.classList.add('hidden');
            content_dashboard.classList.add('hidden');
            content_poles.classList.add('hidden');
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
    </script>
</x-app-layout>
