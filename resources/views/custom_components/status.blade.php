<?php
    use Illuminate\Support\Facades\Auth;
$user = Auth::user();
$status = $user->is_active;
?>


@if( $status == 'Inactive' )
<div class="py-12 pb-3">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" role="alert">
        <div class="border-l-4 border-red-200 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                Your Account's status is currently: <span
                    class="min-w-[92.5px] text-center relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                        <span aria-hidden
                                              class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                        <span class="relative">{{ $status }}</span>
                                    </span>
            </div>
        </div>
    </div>
</div>
<div class="py-1 pb-3">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" role="alert">
        <div class="border-l-4 border-red-200 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                To continue please activate your account.
                <form method="POST" action="{{ route('activate') }}">
                    @csrf
                    @method('PUT')
                    <span
                        class="min-w-[92.5px] text-center relative inline-block font-semibold text-red-900 leading-tight">
                                        <button class="underline relative">Activate</button>
                </span>
                </form>
            </div>
        </div>
    </div>
</div>
@elseif( $status == 'Suspended' )
    <div class="py-12 pb-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" role="alert">
            <div class="border-l-4 border-orange-200 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    Your Account's status is currently: <span
                        class="min-w-[92.5px] text-center relative inline-block px-3 py-1 font-semibold text-orange-900 leading-tight">
                                        <span aria-hidden
                                              class="absolute inset-0 bg-orange-200 opacity-50 rounded-full"></span>
                                        <span class="relative">{{ $status }}</span>
                                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="py-1 pb-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" role="alert">
            <div class="border-l-4 border-orange-200 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    To continue please activate ask an administrator to re-activate your account.
                </div>
            </div>
        </div>
    </div>
@elseif( $status == 'Active' )
    <div class="py-12 pb-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" role="alert">
            <div class="border-l-4 border-green-200 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    Your Account's status is currently: <span
                        class="min-w-[92.5px] text-center relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                        <span aria-hidden
                                              class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                        <span class="relative">{{ $status }}</span>
                                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="py-1 pb-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" role="alert">
            <div class="border-l-4 border-green-200 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    Click here to continue <span
                        class="min-w-[92.5px] text-center relative inline-block font-semibold text-green-900 leading-tight">
                                        <a href="/dashboard" class="underline relative">Continue</a>
                </span>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="py-12 pb-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" role="alert">
            <div class="border-l-4 border-red-400 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    Your Account's status is currently: <span
                        class="min-w-[92.5px] text-center relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                        <span aria-hidden
                                              class="absolute inset-0 bg-red-400 opacity-50 rounded-full"></span>
                                        <span class="relative">No Status</span>
                                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="py-1 pb-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" role="alert">
            <div class="border-l-4 border-red-400 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    To continue please activate ask an administrator to activate your account.
                </div>
            </div>
        </div>
    </div>
@endif
