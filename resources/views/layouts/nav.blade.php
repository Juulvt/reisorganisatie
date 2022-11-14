<nav>
    <div class="container mx-auto flex justify-between gap-1 h-24 py-4">
        <div class="flex-1 max-h-full relative flex items-center">
            <a class="logo h-full" href={{ route('index.index') }}>
                <img class="h-full" src="../images/logo.png" alt="logo">
            </a>
        </div>
        <div class="navigation-links flex-1 flex items-center justify-center gap-4">
            <a href={{ route('index.index') }}>Home</a>
            <a href={{ route('about.index') }}>Over ons</a>
            <a href={{ route('contact.index') }}>Contact</a>
        </div>
        <div class="account-links flex-1 text-right flex items-center justify-end gap-4">
        @if (Route::has('login'))
                @auth
                <div class="dropdown">
                    <button onclick="toggleDropdown('accountDropdown')" class="dropdown">Mijn TravelDock ▼</button>
                    <div id="accountDropdown" class="dropdown-content rounded absolute hidden">
                        <h4>Juul van Tilburg</h4>
                        <ul class="pl-0">
                            <li><a>Mijn Reizen</a><li>
                            <li><a>Account</a><li>
                        </ul>
                        <form id="logout-form" class="pb-0 mb-0" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" form="logout-form" class="dropdown-item pb-0 mb-0" value="Submit">
                                Log out
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