<div class="basis-1/6 min-h-full min-w-fit relative">
    <div>
        <ul>
            <li class="p-3 pr-0">
                <a href={{ route('admin.index') }} class="flex justify-center lg:justify-start items-center gap-3">
                    <div class="inline-block w-1/6 text-xl">
                        <i class="fa-solid fa-house"></i>
                    </div> 
                    <div class="lg:inline-block hidden sidenav-links">Dashboard</div>
                </a>
            </li>
        </ul>
    </div>
    <div class="absolute h-fit min-h-full w-full min-w-fit md:block left-0 top-0 lg:py-5 lg:pl-10 lg:pr-0 bg-white shadow-sm" id="side-nav">
        <h1 class="text-2xl pb-3 hidden lg:inline-block">Admin Panel</h1>
        <ul class="pl-0 text-sm min-w-fit">
            <li class="p-3 min-w-fit lg:hidden">
                <div class="flex justify-center items-center px-3 min-w-fit" onclick="toggleSidenav()">
                    <div class="inline-block text-sm rounded bg-sky-600 text-white min-w-fit">
                        <i class="fa-solid fa-arrow-right m-2" id="toggle-nav"></i>
                    </div>
                </div>
            </li>
            <li class="py-3 pl-3 {{ Request::is('admin') ? 'active' : '' }} min-w-fit">
                <a href={{ route('admin.index') }} class="flex justify-center lg:justify-start items-center gap-3 min-w-fit">
                    <div class="inline-block w-1/6 text-xl min-w-fit">
                        <i class="fa-solid fa-house"></i>
                    </div> 
                    <div class="lg:inline-block hidden sidenav-links">Dashboard</div>
                </a>
            </li>
            <li class="py-3 pl-3 {{ (request()->is('admin/booking*')) ? 'active' : '' }} min-w-fit">
                <a href={{ route('admin.booking.index') }} class="flex justify-center lg:justify-start items-center gap-3 min-w-fit">
                    <div class="inline-block w-1/6 text-xl min-w-fit">
                        <i class="fa-solid fa-calendar-week"></i>
                    </div> 
                    <div class="lg:inline-block hidden sidenav-links">Bookings</div>
                </a>
            </li>
            <li class="py-3 pl-3 {{ (request()->is('admin/trip*')) ? 'active' : '' }} min-w-fit">
                <a type="button" class="flex justify-center lg:justify-start items-center gap-3 min-w-fit transition duration-75 group" aria-controls="dropdown-trip" data-collapse-toggle="dropdown-trip">
                    <div sidebar-toggle-item class="inline-block w-1/6 text-xl min-w-fit">
                        <i class="fa-solid fa-suitcase-rolling"></i>
                    </div> 
                    <div sidebar-toggle-item class="lg:inline-block hidden sidenav-links">Trips</div>
                </a>
                <ul id="dropdown-trip" class="hidden py-2 space-y-2">
                    <li>
                        <a href={{ route('admin.trip.index') }} class="flex items-center p-2 pl-11 w-full text-sm font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Trips</a>
                    </li>
                    <li>
                        <a href={{ route('admin.attribute.index') }} class="flex items-center p-2 pl-11 w-full text-sm font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Attributes</a>
                    </li>
                    <li>
                        <a href={{ route('admin.type.index') }} class="flex items-center p-2 pl-11 w-full text-sm font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Accomodation Types</a>
                    </li>
                </ul>
            </li>
            <li class="py-3 pl-3 {{ (request()->is('admin/location*')) ? 'active' : '' }} min-w-fit">
                <a href={{ route('admin.location.index') }} class="flex justify-center lg:justify-start items-center gap-3 min-w-fit">
                    <div class="inline-block w-1/6 text-xl min-w-fit">
                        <i class="fa-solid fa-location-dot"></i>
                    </div> 
                    <div class="lg:inline-block hidden sidenav-links">Locations</div>
                </a>
            </li>
            <li class="py-3 pl-3 {{ (request()->is('admin/user*')) ? 'active' : '' }} min-w-fit">
                <a type="button" class="flex justify-center lg:justify-start items-center gap-3 min-w-fit transition duration-75 group" aria-controls="dropdown-users" data-collapse-toggle="dropdown-users">
                    <div sidebar-toggle-item class="inline-block w-1/6 text-xl min-w-fit">
                        <i class="fa-solid fa-user"></i>
                    </div> 
                    <div sidebar-toggle-item class="lg:inline-block hidden sidenav-links">Users</div>
                </a>
                <ul id="dropdown-users" class="hidden py-2 space-y-2">
                    <li>
                        <a href={{ route('admin.user.index') }} class="flex items-center p-2 pl-11 w-full text-sm font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Accounts</a>
                    </li>
                    <li>
                        <a href={{ route('admin.role.index') }} class="flex items-center p-2 pl-11 w-full text-sm font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Roles</a>
                    </li>
                </ul>
            </li>
            <li class="py-3 pl-3 min-w-fit">
                <a type="button" class="flex justify-center lg:justify-start items-center gap-3 min-w-fit transition duration-75 group" aria-controls="dropdown-settings" data-collapse-toggle="dropdown-settings" aria-expanded="{{ (request()->is('admin/settings*')) ? 'true' : '' }}">
                    <div sidebar-toggle-item class="inline-block w-1/6 text-xl min-w-fit">
                        <i class="fa-solid fa-gear"></i>
                    </div> 
                    <div sidebar-toggle-item class="lg:inline-block hidden sidenav-links">Settings</div>
                </a>
                <ul id="dropdown-settings" class="{{ (request()->is('admin/settings*')) ? '' : 'hidden' }} py-2 space-y-2">
                    <li class="{{ (request()->is('admin/settings/contact')) ? 'active' : '' }}">
                        <a href={{ route('admin.setting.contact') }} class="flex items-center p-2 pl-11 w-full text-sm font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Contact</a>
                    </li>
                    <li class="{{ (request()->is('admin/settings/about')) ? 'active' : '' }}">
                        <a href={{ route('admin.setting.about') }} class="flex items-center p-2 pl-11 w-full text-sm font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">About</a>
                    </li>
                    <li class="{{ (request()->is('admin/settings/privacyterms')) ? 'active' : '' }}">
                        <a href={{ route('admin.setting.privacy') }} class="flex items-center p-2 pl-11 w-full text-sm font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Privacy and Terms & Conditions</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>

<script>
    function toggleSidenav() {

        const icon = document.getElementById("toggle-nav");
        icon.classList.toggle("fa-arrow-right");
        icon.classList.toggle("fa-arrow-left");

        const sidenav = document.getElementById("side-nav");
        sidenav.classList.toggle("mobile-open");

        const links = document.getElementsByClassName("sidenav-links");
        for (let i = 0; i < links.length; i++) {
            links[i].classList.toggle("hidden");
        }

    }
</script>
