<?php
use Illuminate\Support\Facades\Route;
?>
<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
{{--                    <x-nav-link :href="route('roles')" :active="request()->routeIs('roles')">--}}
{{--                        {{ __('Roles') }}--}}
{{--                    </x-nav-link>--}}
{{--                    <x-nav-link :href="route('users')" :active="request()->routeIs('users')">--}}
{{--                        {{ __('Users') }}--}}
{{--                    </x-nav-link>--}}
{{--                    <x-nav-link :href="route('groups')" :active="request()->routeIs('groups')">--}}
{{--                        {{ __('Groups') }}--}}
{{--                    </x-nav-link>--}}
                </div>
            </div>
            @can('supervisor on')
            <div id="nav-modal-supervisor" class="bg-orange-100 border-l-4 border-orange-500 rounded-l text-orange-500 px-4 py-3 shadow-md h-[80%] mt-[0.5%] w-[40%]" role="alert">
                <div class="flex">
                    <div class="py-1"><svg class="fill-current h-5 w-5 text-orange-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                    <div>
                        <p class="font-bold">Supervisor mode On</p>
                    </div>

                </div>
                <span id="nav-modal_close" class="mt-[-6%] float-right">
                        <i id="nav-modal_close" class="fa-solid fa-x"></i>
                    </span>
            </div>
            @endcan

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
{{--                            <div>{{ Auth::user()->name }}</div>--}}
                            <div class="icon icon-{{ Auth::user()->icon_color }}">{{Auth::user()->icon}}</div>
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        @can('supervisor can')
                            @can('supervisor on')
                                <x-dropdown-link :href="route('supervisor.off')">
                                    {{ __('Supervisor Off') }}
                                </x-dropdown-link>
                            @endcan
                                @cannot('supervisor on')
                                    <x-dropdown-link :href="route('supervisor.on')">
                                        {{ __('Supervisor On') }}
                                    </x-dropdown-link>
                                @endcannot
                        @endcan
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
@if(Route::currentRouteName() != 'status')
    @if(Auth::user()->is_active != "Active")
        <script>window.location = "/status";</script>
    @endif
@endif
<script>
    // Get the modal
    let modalnav = document.getElementById("nav-modal-supervisor");

    // Get the <span> element that closes the modal
    let spannav = document.getElementById("nav-modal_close");

    // When the user clicks on <span> (x), close the modal
    spannav.onclick = function() {
        modalnav.style.display = "none";
    }
</script>
