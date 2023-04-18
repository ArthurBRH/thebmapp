
@if( $request->status == 'Requested' )
    <span
        class="min-w-[92.5px] text-center relative inline-block px-3 py-1 font-semibold text-orange-900 leading-tight">
                                        <span aria-hidden
                                              class="absolute inset-0 bg-orange-200 opacity-50 rounded-full"></span>
                                        <span class="relative">Requested</span>
                                    </span>

@elseif($request->status == 'Active')
    <span
        class="min-w-[92.5px] text-center relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                        <span aria-hidden
                                              class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                        <span class="relative">Active</span>
                                    </span>
@elseif($request->status == 'NonUse')
    <span
        class="min-w-[92.5px] text-center relative inline-block px-3 py-1 font-semibold text-gray-900 leading-tight">
                                        <span aria-hidden
                                              class="absolute inset-0 bg-gray-200 opacity-50 rounded-full"></span>
                                        <span class="relative">Nonuse</span>
                                    </span>
@elseif($request->status == 'Accepted')
    <span
        class="min-w-[92.5px] text-center relative inline-block px-3 py-1 font-semibold text-blue-600 leading-tight">
                                        <span aria-hidden
                                              class="absolute inset-0 bg-blue-200 opacity-50 rounded-full"></span>
                                        <span class="relative">Accepted</span>
                                    </span>
@elseif($request->status == 'Denied')
    <span
        class="min-w-[92.5px] text-center relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                        <span aria-hidden
                                              class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                        <span class="relative">Denied</span>
                                    </span>

@else
    <span
        class="min-w-[92.5px] text-center relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                        <span aria-hidden
                                              class="absolute inset-0 bg-red-400 opacity-50 rounded-full"></span>
                                        <span class="relative">No Status</span>
                                    </span>
@endif
