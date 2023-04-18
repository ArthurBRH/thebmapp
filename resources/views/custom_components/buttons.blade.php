
@if( $user->is_active == 'Inactive' )
<span
    class="min-w-[92.5px] text-center relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                        <span aria-hidden
                                              class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                        <span class="relative">Inactive</span>
                                    </span>


@elseif($user->is_active == 'Suspended')
<span
    class="min-w-[92.5px] text-center relative inline-block px-3 py-1 font-semibold text-orange-900 leading-tight">
                                        <span aria-hidden
                                              class="absolute inset-0 bg-orange-200 opacity-50 rounded-full"></span>
                                        <span class="relative">Suspended</span>
                                    </span>

@elseif($user->is_active == 'Active')
<span
    class="min-w-[92.5px] text-center relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                        <span aria-hidden
                                              class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                        <span class="relative">Active</span>
                                    </span>

@else
    <span
        class="min-w-[92.5px] text-center relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                        <span aria-hidden
                                              class="absolute inset-0 bg-red-400 opacity-50 rounded-full"></span>
                                        <span class="relative">No Status</span>
                                    </span>
@endif
