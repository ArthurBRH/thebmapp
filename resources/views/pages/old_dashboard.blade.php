<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @can('supervisor on')
        <div class="py-12 pb-3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" role="alert">
                <div class="border-l-4 border-orange-500 bg-orange-100 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-orange-500">
                        {{ __("Supervisor mode On!") }}
                    </div>
                </div>
            </div>
        </div>
    @endcan
    @cannot('supervisor on')
        <div class="py-12 pb-3">
            @endcannot
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" role="alert">
                <div class="border-l-4 border-indigo-400 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        Welcome {{ $user->name }}
                    </div>
                </div>
            </div>
            @cannot('supervisor on')
        </div>
    @endcannot
    @if($user->hasAnyPermission($permissions))
        @if($user->hasPermissionTo('contacted'))
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" role="alert">
                <div class="border-l-4 border-green-600 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        Please wait for our administrators to accept your request.
                    </div>
                </div>
            </div>
        @endif
    @else
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" role="alert">
            <div class="border-l-4 border-red-400 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    To use your account please contact an administrator for permissions! <a class="link" href="/user/{{ $user->id }}/contact">Contact</a>
                </div>
            </div>
        </div>
    @endif
</x-app-layout>
