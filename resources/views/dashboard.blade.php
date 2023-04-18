@include('pages.navbar')
<main class="main">
    <div class="responsive-wrapper">
        <div class="main-header">
            <h1>Dashboard</h1>
        </div>
        <div class="horizontal-tabs">
        </div>
        @can('supervisor on')
            <div class="c-header content-header-intro text-orange-500 border-l-4 border-l-orange-500 sm:rounded-lg h-[90px]">
                <h2>Supervisor mode On!</h2>
                <p>To disable click the button in the navbar</p>
            </div>
            <br>
        @endcan
        <div class="c-header content-header-intro border-l-4 border-l-indigo-400 sm:rounded-lg h-[90px]">
            <h2>Welcome {{ $user->name }}</h2>
            <p>You're logged in</p>
        </div>
        <br>

        @if($user->hasAnyPermission($permissions))
            @if($user->hasPermissionTo('contacted'))

                <div class="c-header content-header-intro border-l-4 border-l-green-600 sm:rounded-lg h-[90px]">
                    <h2>Requested</h2>
                    <p>Please wait for our administrators to accept your request.</p>
                </div>
            @endif
        @else
            @if($request_setting->status === 'true')

            <div class="c-header content-header-intro border-l-4 border-l-green-600 sm:rounded-lg h-[90px]">
                <h2>Request Permissions</h2>
                <p>To use your account please contact an administrator for permissions!                 <a class="link" href="/user/{{ $user->id }}/contact">Contact</a>
                </p>
            </div>
            @else
                <div class="c-header content-header-intro border-l-4 border-l-red-400 sm:rounded-lg h-[90px]">
                    <h2>Request Permissions</h2>
                    <p>Je kan op dit moment geen request doen</p>
                    </p>
                </div>
            @endif
        @endif


    </div>
</main>
