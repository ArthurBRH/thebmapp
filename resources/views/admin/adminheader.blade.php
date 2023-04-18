@include('pages.navbar')
<?php
include(app_path().'/includes/AdminRoutes.php');
?>


<main class="main">
    <div class="responsive-wrapper">
        <div class="main-header">
            <h1>Admin panel</h1>
        </div>
        <div class="horizontal-tabs">
            <x-nav-link :href="route('panel')" :active="request()->routeIs('panel')">{{ __('Panel') }}</x-nav-link>
            <x-nav-link :href="route('admin.user.requests')" :active="request()->routeIs($requestroutes)">{{ __('Requests') }}</x-nav-link>
            <x-nav-link :href="route('users')" :active="request()->routeIs('users', 'user.invite', 'register')">{{ __('Users') }}</x-nav-link>
            <x-nav-link :href="route('roles')" :active="request()->routeIs($roleroutes)">{{ __('Roles') }}</x-nav-link>
            <x-nav-link :href="route('permissions')"
                        :active="request()->routeIs($permissionroutes)">{{ __('Permissions') }}</x-nav-link>
            <x-nav-link :href="route('logs')" :active="request()->routeIs('logs')">{{ __('Logs') }}</x-nav-link>
            {{--            <x-nav-link :href="route('groups')" :active="request()->routeIs('groups')">{{ __('Groups') }}</x-nav-link>--}}
            {{--            <x-nav-link :href="route('users')" :active="request()->routeIs('users')">{{ __('Integrations') }}</x-nav-link>--}}
        </div>
<?php
$info_tab = 'tab';
?>
@include('custom_components.infotab')
        <div class="content"></div>
        @if (session('status'))
            <div class="c-header content-header-intro text-orange-500 border-l-4 border-l-orange-500 sm:rounded-lg h-[90px]">
                <h2>Request</h2>
                <p>{{ session('status') }}</p>
            </div>
@endif
