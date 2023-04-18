@vite(['resources/css/new.css', 'resources/css/style.css', 'resources/css/app.css
'])
@if(Route::currentRouteName() != 'status')
    @if(Auth::user()->is_active != "Active")
        <script>window.location = "/status";</script>
    @endif
@endif
<?php
$requestAmount = \App\Models\Admin_contact::where('status', 'Requested')->count();
?>
<title>Bmapp</title>
<script src="https://kit.fontawesome.com/4939d66280.js" crossorigin="anonymous"></script>
<?php
include(app_path().'/includes/AdminRoutes.php');
?>
<header class="header">
    <div class="header-content responsive-wrapper h-[100%]">
        <div class="header-logo">
            <a href="{{ route('dashboard') }}">
                <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
            </a>
        </div>
        <?php

        $route = Route::current();
        $route = $route->getname();
        if ($route == 'panel') {
            if ($requestAmount === 1) {
                $requestName = 'New request';
            } else {
                $requestName = 'New requests';
            }
        }
        ?>
        <div class="header-navigation h-[100%]">
            <nav class="header-navigation-links h-[100%]">
                <x-nav-link class="h-[100%] nav-link" :href="route('dashboard')" :active="request()->Is('dashboard')">{{ __('Dashboard') }}</x-nav-link>
                @can('admin.*')
                <x-nav-link class="h-[100%] nav-link" :href="route('panel')" :active="request()->routeIs($adminheaders)">{{ __('Admin') }}</x-nav-link>
                @endcan
                    @can('admin.*')
                <x-nav-link class="h-[100%] nav-link" :href="route('users')" :active="request()->routeIs('users', 'user.invite', 'register')">{{ __('Users') }}</x-nav-link>
                @endcan
                @can('admin.*')
                    <x-nav-link class="h-[100%] nav-link" :href="route('admin.user.requests')" :active="request()->routeIs($requestroutes)">{{ __(' Requests') }}</x-nav-link>
                @endcan
            </nav>
            <div class="header-navigation-actions">
{{--                if--}}
                @can('supervisor can')
                    @can('supervisor on')
                        <x-dropdown-link :href="route('supervisor.off')" class="button supervisor">
                            <i class="fa-solid fa-shield-halved"></i>
                            <span>Supervisor</span>
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('supervisor.off')" class="icon-button supervisor">
                            <i class="fa-solid fa-user-tie"></i>
                        </x-dropdown-link>
                    @endcan
                    @cannot('supervisor on')
                            <x-dropdown-link :href="route('supervisor.on')" class="icon-button no-supervisor">
                                <i class="fa-solid fa-user-tie"></i>
                            </x-dropdown-link>
                    @endcannot
                @endcan
                @can('admin.*')
                <a href="/admin/panel" class="icon-button">
                    <i class="fa-solid fa-lock"></i>
                </a>
                @endcan
                <form style="margin-top: auto !important; margin-block-end: auto; cursor: pointer;" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="icon-button" :href="route('logout')"
                                     onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </a>
                </form>
                <a href="/profile">
                    <div class="nav-icon icon icon-{{ Auth::user()->icon_color }}">{{Auth::user()->icon}}</div>
                </a>

            </div>
        </div>
        <a href="#" class="button">
            <i class="ph-list-bold"></i>
            <span>Menu</span>
        </a>
    </div>
</header>
<body class="bg-gray-100">
