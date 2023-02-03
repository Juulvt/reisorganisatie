<div class="w-60 h-full shadow-md bg-white absolute z-30 hidden" id="mobile-nav">
  <div class="pt-4 pb-2 px-6">
  @if (Route::has('login'))
    @auth
    <a href={{ route('user.account') }}>
      <div class="flex items-center gap-3">
      @if (isset($user->image_path))
        <div class="w-14 h-10 rounded-lg overflow-hidden">
            <img src="{{route('index.index')}}{{$user->image_path}}" class="min-h-full min-w-full" alt="Avatar">
        </div>
        @else
        <div class="w-14 h-10 rounded-lg overflow-hidden flex justify-center items-center bg-slate-200 font-bold">
            <span>{{ substr(Auth::user()->name,0,1) }}</span>
        </div>
      @endif
      <span class="text-lg font-semibold">{{Auth::user()->name}}</span>
      </div>
    </a>
    @endauth
  @endif
  </div>
  <ul class="relative px-1">
  @if (Route::has('login'))
                @auth
    <li class="relative">
      <a href={{ route('user.trips') }} class="flex gap-2 items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out" href="#!" data-mdb-ripple="true" data-mdb-ripple-color="primary">
        <i class="fa-solid fa-suitcase-rolling"></i>
        <span>My Trips</span>
      </a>
    </li>
    <li class="relative">
      <a href={{ route('user.account') }} class="flex gap-2 items-center text-sm gap-2 py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out" href="#!" data-mdb-ripple="true" data-mdb-ripple-color="primary">
        <i class="fa-solid fa-user"></i>
        <span>Account</span>
      </a>
    </li>
    @if (Auth::user()->hasRole('Admin'))
    <li class="relative">
      <a href={{ route('admin.index') }} class="flex gap-2 items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out" href="#!" data-mdb-ripple="true" data-mdb-ripple-color="primary">
        <i class="fa-solid fa-gear"></i>
        <span>Admin panel</span>
      </a>
    </li>
    @endif
    @endauth
    @endif
    <hr class="my-2">
    <li class="relative">
      <a href={{ route('index.index') }} class="flex gap-2 items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out" href="#!" data-mdb-ripple="true" data-mdb-ripple-color="primary">
        <i class="fa-solid fa-house"></i>
        <span>Home</span>
      </a>
    </li>
    <li class="relative">
      <a href={{ route('location.index') }} class="flex gap-2 items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out" href="#!" data-mdb-ripple="true" data-mdb-ripple-color="primary">
        <i class="fa-solid fa-location-dot"></i>
        <span>Locations</span>
      </a>
    </li>
    <li class="relative">
      <a href={{ route('about.index') }} class="flex gap-2 items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out" href="#!" data-mdb-ripple="true" data-mdb-ripple-color="primary">
        <i class="fa-solid fa-address-card"></i>
        <span>About</span>
      </a>
    </li>
    <li class="relative">
      <a href={{ route('contact.index') }} class="flex gap-2 items-center text-sm py-4 px-6 h-12 overflow-hidden text-gray-700 text-ellipsis whitespace-nowrap rounded hover:text-blue-600 hover:bg-blue-50 transition duration-300 ease-in-out" href="#!" data-mdb-ripple="true" data-mdb-ripple-color="primary">
        <i class="fa-solid fa-envelope"></i>
        <span>Contact</span>
      </a>
    </li>
    
  </ul>
</div>
<nav class="main-background">
    <div class="container mx-auto flex justify-between gap-1 h-24 py-4">
        <div class="flex-1 max-h-full relative flex items-center">
            <a class="logo h-full" href={{ route('index.index') }}>
                <img class="h-full" src="{{ route('index.index') }}/images/logo.png" alt="logo">
            </a>
        </div>
        <div class="navigation-links flex-1 items-center justify-center gap-4 hidden lg:flex">
            <a href={{ route('index.index') }}>Home</a>
            <a href={{ route('location.index') }}>Locations</a>
            <a href={{ route('about.index') }}>About</a>
            <a href={{ route('contact.index') }}>Contact</a>
        </div>
        <div class="account-links flex-1 text-right flex items-center justify-end gap-4">
        <a class="lg:hidden" onclick="toggleNav()"><i class="fa-solid fa-bars"></i></a>

        @if (Route::has('login'))
                @auth
                <div class="dropdown hidden lg:block">
                    <div class="flex gap-3">
                        <button onclick="toggleDropdown('accountDropdown')" class="dropdown">My TravelDock ▼</button>
                        @if (isset($user->image_path))
                        <div class="w-14 h-10 rounded-lg overflow-hidden">
                            <img src="{{route('index.index')}}{{$user->image_path}}" class="min-h-full min-w-full" alt="Avatar">
                        </div>
                        @else
                        <div class="w-14 h-10 rounded-lg overflow-hidden flex justify-center items-center bg-slate-200 font-bold">
                            <span>{{ substr(Auth::user()->name,0,1) }}</span>
                        </div>
                        @endif
                    </div>
                    <div id="accountDropdown" class="dropdown-content rounded absolute hidden">
                        <div class="flex justify-center mb-2">
                        @if (isset($user->image_path))
                        <div class="w-14 h-10 rounded-lg overflow-hidden">
                            <img src="{{route('index.index')}}{{$user->image_path}}" class="min-h-full min-w-full" alt="Avatar">
                        </div>
                        @else
                        <div class="w-14 h-10 rounded-lg overflow-hidden flex justify-center items-center bg-slate-200 font-bold">
                            <span>{{ substr(Auth::user()->name,0,1) }}</span>
                        </div>
                        @endif
                        </div>
                        <h4>{{Auth::user()->name}}</h4>
                        <ul class="pl-0">
                            <li><a href={{ route('user.trips') }}>My Trips</a></li>
                            <li><a href={{ route('user.account') }}>Account</a></li>
                            @if (Auth::user()->hasRole('Admin'))
                            <li><a href={{ route('admin.index') }}>Admin Panel</a></li>
                            @endif
                        </ul>
                        <form id="logout-form" class="pb-0 mb-0" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" form="logout-form" class="dropdown-item pb-0 mb-0 font-bold" value="Submit">
                            <i class="fa-solid fa-angle-left"></i> Log out
                            </button>
                        </form>
                    </div>
                </div>
                    @else
                        <a href="{{ route('login') }}">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
        @endif
        </div>
    </div>
</nav>
<script>
    function toggleNav() {
        document.getElementById('mobile-nav').classList.toggle('hidden');
    }
</script>