<aside class="bg-red-100 h-[100vh] w-[20vw] py-10 pl-12 items-start min-w-min border-gray-300 z-50 md:block absolute top-0 left-0" wire:ignore>
    <div class="shrink-0 flex items-center justify-center pr-[28px]">
        <a href="{{ route('dashboard') }}" wire:navigate>
            <x-application-logo class="block h-9 w-auto fill-red-600 " />
        </a>
        <span class="ml-3 text-red-600">Admin Dashboard</span>
    </div>

    <!-- Menu -->
    
    <div class="mt-12 flex flex-col gap-y-4 text-gray-500 fill-gray-500 text-sm">
        <div class="text-gray-400/70  font-medium uppercase">Webpage</div>
        <x-navbarcomponent route="browse" :href="route('browseMovies')" icon="home_app_logo" name="Home" />
        
        {{-- @auth
            <x-navbarcomponent route="favorite" href="" icon="favorite" :name="Auth::user()->name" extra="'s Favorite" />
        @endauth --}}
        
        {{-- <x-navbarcomponent route="upcoming" href="/upcoming" icon="event_upcoming" name="Upcoming Films" /> --}}
        @auth
        
        @if (Auth::user() && Auth::user()->isadmin)
            <div class="mt-8 text-gray-400/70  font-medium uppercase">Admin</div>
            <x-navbarcomponent route="admin" href="{{ route('admin') }}" icon="admin_panel_settings" name="Admin" />
            <x-adminnavbarcomponent route="adminActors" href="{{ route('adminActors') }}" icon="photo_camera_front" name="Actor Management" />
            <x-adminnavbarcomponent route="adminMovies" href="{{ route('adminMovies') }}" icon="movie" name="Movie Management" />
            <x-adminnavbarcomponent route="adminDirectors" href="{{ route('adminDirectors') }}" icon="recent_actors" name="Director Management" />
        @endif
            <div class="mt-8 text-gray-400/70  font-medium uppercase">General</div>
            <x-navbarcomponent route="profile" :href="route('profile.edit')" icon="account_box" name="Profile" />
            {{-- <x-navbarcomponent route="settings" :href="route('settings')" icon="settings" name="Settings" /> --}}
            
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                {{-- <x-navbarcomponent route="" :href="route('logout')" icon="logout" name="Log Out" /> --}}
                <a class="flex items-center space-x-2 py-1 cursor-pointer  font-semibold hover:text-red-400 hover:border-r-red-300 transition hover:scale-[1.05] " :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    <span class="material-symbols-outlined">
                        logout
                    </span>
                    <span>{{ ('Log Out') }}</span>
                </a>
            </form>
        @else
            <div class="mt-8 text-gray-400/70  font-medium uppercase">General</div>
            <x-navbarcomponent route="login" :href="route('login')" icon="login" name="Log In" />
            <x-navbarcomponent route="register" :href="route('register')" icon="how_to_reg" name="Register" />
        @endauth
        
        

    </div>

</aside>