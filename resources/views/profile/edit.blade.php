@include('pages.navbar')


<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-user-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
            @cannot('supervisor on')
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.deactivate-user-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
            @endcannot

            @can('supervisor on')
                <div class="p-4 sm:p-8  border-l-4 border-orange-500 bg-orange-100 text-orange-500 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        Disable Supervisor mode to Deactivate your account

                    </div>
                </div>

                <div class="p-4 sm:p-8 border-l-4 border-orange-500 bg-orange-100 text-orange-500 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        Disable Supervisor mode to Delete your account

                    </div>
                </div>
            @endcan
        </div>
    </div>

