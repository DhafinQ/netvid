<nav aria-label="secondary" x-data="{ open: false }"
    class="sticky top-0 z-10 flex items-center justify-between px-4 py-4 sm:px-6 transition-transform duration-500 bg-white dark:bg-dark-eval-1"
    :class="{
        '-translate-y-full': scrollingDown,
        'translate-y-0': scrollingUp,
    }">

    <div class="flex items-center gap-3">
        <form action="{{route('search.index')}}" method="get"></form>
        {{-- <x-button type="button" class="md:hidden" iconOnly variant="secondary" srText="Toggle dark mode"
            @click="toggleTheme">
            <x-heroicon-o-moon x-show="!isDarkMode" aria-hidden="true" class="w-6 h-6" />
            <x-heroicon-o-sun x-show="isDarkMode" aria-hidden="true" class="w-6 h-6" />
        </x-button> --}}
    </div>

    <div class="flex items-center gap-3">
        {{-- <x-button type="button" class="hidden md:inline-flex" iconOnly variant="secondary" srText="Toggle dark mode"
            @click="toggleTheme">
            <x-heroicon-o-moon x-show="!isDarkMode" aria-hidden="true" class="w-6 h-6" />
            <x-heroicon-o-sun x-show="isDarkMode" aria-hidden="true" class="w-6 h-6" />
        </x-button> --}}
        <form method="get" action="{{route('search.index')}}" class="flex">
            <input type="text" name="term" class="py-2 bg-slate-800  border-gray-400
            dark:border-gray-600 dark:bg-dark-eval-1
            dark:text-gray-300 dark:focus:ring-offset-dark-eval-1 rounded-l-md" placeholder="Search..">
            <x-button type="submit" class="" style="border-radius: 0px 5px 5px 0px">
                <x-heroicon-o-search aria-hidden="true" class="w-6 h-6" />
            </x-button>
        </form>
        <x-dropdown align="right" width="48">
            
            <x-slot name="trigger">

                @if (!Auth::check())

                    <div class="hidden top-0 right-0 px- py-2 sm:block">
                        <a href="{{ route('login') }}" class="text-gray-200 text-lg py-4 px-4 rounded-lg hover:bg-red-600 hover:scale-105 duration-150 ease-out hover:text-white">Log in</a>
                        <a href="{{ route('register') }}" class="ml-1 text-lg text-gray-200 py-4 px-4 rounded-lg hover:bg-red-600 hover:scale-105 duration-150 ease-out hover:text-white">Register</a>
                    </div>
                    
                @endif

                {{-- @auth = check login ato blm --}}
                @auth
                    <button
                    class="flex items-center p-2 text-sm font-medium text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none focus:ring focus:ring-red-400 focus:rounded-sm focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark-eval-1 dark:text-gray-400 dark:hover:text-gray-200">
                    <div>{{ auth()->user()->username }}</div>
                    <div class="ml-1">
                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    </button>
                @endauth
                
            </x-slot>

            <x-slot name="content">
                <!-- Authentication -->
                @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                    <x-dropdown-link :href="route('profile')">
                        {{ __('My Profile') }}
                    </x-dropdown-link>
                </form>
                @endauth
            </x-slot>
        </x-dropdown>
    </div>
</nav>

<!-- Mobile bottom bar -->
<div class="fixed inset-x-0 bottom-0 flex items-center justify-between px-4 py-4 sm:px-6 transition-transform duration-500 bg-white md:hidden dark:bg-dark-eval-1"
    :class="{
        'translate-y-full': scrollingDown,
        'translate-y-0': scrollingUp,
    }">
    {{-- <x-button type="button" iconOnly variant="secondary" srText="Search">
        <x-heroicon-o-search aria-hidden="true" class="w-6 h-6" />
    </x-button> --}}

    <a href="{{ route('home.index') }}">
        <span class="sr-only">NetVid</span>
        <x-application-logo aria-hidden="true" class="w-10 h-10" />
    </a>

    <x-button type="button" iconOnly variant="secondary" srText="Open main menu"
        @click="isSidebarOpen = !isSidebarOpen">
        <x-heroicon-o-menu x-show="!isSidebarOpen" aria-hidden="true" class="w-6 h-6" />
        <x-heroicon-o-x x-show="isSidebarOpen" aria-hidden="true" class="w-6 h-6" />
    </x-button>
</div>