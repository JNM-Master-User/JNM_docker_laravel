<nav id="header" class="bg-white shadow-lg dark:text-white dark:bg-gray-700 fixed w-full z-30 top-0 text-gray">
    <div class="w-full container mx-auto flex flex-wrap items-center mt-0 py-2">
        <div class="block lg:hidden pr-4">
            <button id="nav-toggle" class="flex items-center p-1 text-gray-500 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                </svg>
            </button>
        </div>
        <div class="pl-4 flex items-center">
            <a href="{{ route('accueil') }}" class="text-xl font-bold flex items-center lg:ml-2.5">
                <x-application-logo class="block fill-current text-gray-600 h-6 mr-2" >
                </x-application-logo>
            </a>
        </div>
        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 bg-white dark:bg-gray-700 lg:bg-transparent text-black p-4 lg:p-0 z-20" id="nav-content">
            <ul class="list-reset lg:flex justify-end flex-1 items-center">
                <li class="cursor-pointer my-2 pr-2 pl-2 mr-1 ml-1 text-gray-500 dark:text-gray-400 bg-gray-100 dark:bg-gray-600 hover:bg-gray-200 dark:hover:bg-gray-500 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-400 rounded-lg text-sm py-2">
                    <a class="inline-block dark:text-white text-black font-bold no-underline" href="{{ route('accueil') }}">{{__('Home')}}</a>
                </li>
                <li class="cursor-pointer my-2 pr-2 pl-2 mr-1 ml-1 text-gray-500 dark:text-gray-400 bg-gray-100 dark:bg-gray-600 hover:bg-gray-200 dark:hover:bg-gray-500 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-400 rounded-lg text-sm py-2">
                    <a class="inline-block dark:text-white text-black font-bold no-underline" href="{{ route('bookings') }}">{{__('Booking')}}</a>
                </li>
                <li class="cursor-pointer my-2 pr-2 pl-2 mr-1 ml-1 text-gray-500 dark:text-gray-400 bg-gray-100 dark:bg-gray-600 hover:bg-gray-200 dark:hover:bg-gray-500 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-400 rounded-lg text-sm py-2">
                    <a class="inline-block dark:text-white text-black font-bold no-underline" href="{{ route('partners') }}">{{__('Partners')}}</a>
                </li>
                <li class="cursor-pointer my-2 pr-2 pl-2 mr-1 ml-1 text-gray-500 dark:text-gray-400 bg-gray-100 dark:bg-gray-600 hover:bg-gray-200 dark:hover:bg-gray-500 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-400 rounded-lg text-sm py-2">
                    <a class="inline-block dark:text-white text-black font-bold no-underline" href="#">{{__('Tournament')}}</a>
                </li>
            @auth
            @if($user->userSensitiveData && !$user->EnsureIsAdmin())
                <li class="my-2 pr-2 pl-2 mr-1 ml-1 text-gray-500 dark:text-gray-400 bg-gray-100 dark:bg-gray-600 hover:bg-gray-200 dark:hover:bg-gray-500 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-400 rounded-lg text-sm py-1">
                    <form method="GET" action="{{ route('profil') }}">
                        <button type="submit" class="inline-block  text-black font-bold no-underline">
                            <div class="flex ml-1 mr-1">
                                <img class="h-10 w-10 rounded-full" src="{{asset('storage/users_profile_picture/'.$user->userSensitiveData->path_picture)}}" alt="">
                                <div class="ml-3 text-sm font-normal text-gray-500 dark:text-white">
                                    <div class="text-base font-semibold text-gray-900 dark:text-white">{{$user->userSensitiveData->name ?? ''}} {{$user->userSensitiveData->last_name ?? ''}}</div>
                                    <div class="text-sm font-normal text-gray-500 dark:text-gray-200 ">{{$user->email}}</div>
                                </div>
                            </div>
                        </button>
                    </form>
                </li>
            @endif
            @endauth
            </ul>
            <x-buttons.dark-theme-toggle-button>
            </x-buttons.dark-theme-toggle-button>
            @auth
            @if($user->EnsureIsAdmin())
                <x-buttons.success-button class="my-2 mr-2 ml-2"><i class="fa-solid fa-screwdriver-wrench"></i></x-buttons.success-button>
                <form method="GET" action="{{ route('dashboard.accueil') }}">
                    <x-buttons.link-button class="my-2 mr-2 ml-2" name="{{ __('Dashboard') }}"></x-buttons.link-button>
                </form>
            @endif
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-buttons.form-button class="my-2 mr-2 ml-2" name="{{ __('Log Out') }}"></x-buttons.form-button>
                </form>
            @endauth
            @guest
                <form method="GET" action="{{ route('login') }}">
                    <x-buttons.form-button class="my-2 mr-2 ml-2" name="{{ __('Log In') }}"></x-buttons.form-button>
                </form>
                <form method="GET" action="{{ route('register') }}">
                    <x-buttons.form-button class="my-2 mr-2 ml-2" name="{{ __('Register') }}"></x-buttons.form-button>
                </form>
            @endguest
        </div>
    </div>
</nav>
<script>
    /*Toggle dropdown list*/
    /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

    var navMenuDiv = document.getElementById("nav-content");
    var navMenu = document.getElementById("nav-toggle");

    document.onclick = check;
    function check(e) {
        var target = (e && e.target) || (event && event.srcElement);

        //Nav Menu
        if (!checkParent(target, navMenuDiv)) {
            // click NOT on the menu
            if (checkParent(target, navMenu)) {
                // click on the link
                if (navMenuDiv.classList.contains("hidden")) {
                    navMenuDiv.classList.remove("hidden");
                } else {
                    navMenuDiv.classList.add("hidden");
                }
            } else {
                // click both outside link and outside menu, hide menu
                navMenuDiv.classList.add("hidden");
            }
        }
    }
    function checkParent(t, elm) {
        while (t.parentNode) {
            if (t == elm) {
                return true;
            }
            t = t.parentNode;
        }
        return false;
    }
</script>