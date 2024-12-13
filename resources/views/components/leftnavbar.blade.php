<aside class=" w-1/6 py-10 pl-7  min-w-min  border-r border-gray-300 z-50 md:block relative" wire:ignore>
    <div class=" font-bold text-lg flex items-center gap-x-3 pl-3">
        <svg class="h-8 w-8 fill-red-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M10 15.5v-7c0-.41.47-.65.8-.4l4.67 3.5c.27.2.27.6 0 .8l-4.67 3.5c-.33.25-.8.01-.8-.4Zm11.96-4.45c.58 6.26-4.64 11.48-10.9 10.9 -4.43-.41-8.12-3.85-8.9-8.23 -.26-1.42-.19-2.78.12-4.04 .14-.58.76-.9 1.31-.7v0c.47.17.75.67.63 1.16 -.2.82-.27 1.7-.19 2.61 .37 4.04 3.89 7.25 7.95 7.26 4.79.01 8.61-4.21 7.94-9.12 -.51-3.7-3.66-6.62-7.39-6.86 -.83-.06-1.63.02-2.38.2 -.49.11-.99-.16-1.16-.64v0c-.2-.56.12-1.17.69-1.31 1.79-.43 3.75-.41 5.78.37 3.56 1.35 6.15 4.62 6.5 8.4ZM5.5 4C4.67 4 4 4.67 4 5.5 4 6.33 4.67 7 5.5 7 6.33 7 7 6.33 7 5.5 7 4.67 6.33 4 5.5 4Z"></path>
        </svg>        
        <div class="tracking-wide">Nickflix<span class="text-red-600">.</span></div>
    </div>

    <!-- Menu -->
    
    <div class="mt-12 flex flex-col gap-y-4 text-gray-500 fill-gray-500 text-sm">
        <div class="text-gray-400/70  font-medium uppercase">Menu</div>
        <x-navbarcomponent route="browse" :href="route('browseMovies')" icon="home_app_logo" name="Home" />

        @auth
            <x-navbarcomponent route="favorite" href="{{ route('popular') }}" icon="favorite" name="Hot and Popular" />
        @endauth
        
        <x-navbarcomponent route="upcoming" href="{{ route('upcoming') }}" icon="event_upcoming" name="Upcoming Films" />
        @auth
        
        @if (Auth::user() && Auth::user()->isadmin)
            <div class="mt-8 text-gray-400/70  font-medium uppercase">Admin</div>
            <x-navbarcomponent route="admin" href="{{ route('admin') }}" icon="admin_panel_settings" name="Admin" />
        @endif
            <div class="mt-8 text-gray-400/70  font-medium uppercase">General</div>
            {{-- <x-navbarcomponent route="profile" :href="route('profile.edit')" icon="account_box" name="Profile" /> --}}
            <x-navbarcomponent route="settings" :href="route('settings')" icon="settings" name="Settings" />
            
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