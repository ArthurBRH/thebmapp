@include('admin.adminheader')
@if($setting->status === 'true')
<div class="header-navigation-actions">
    <div class="horizontal-tabs">
        <a id="logsmall" class="active bgnone cursor-pointer">Small</a>
        <a id="logwide" class="bgnone cursor-pointer">Wide</a>
    </div>
</div>
<div class="content mt-[0px]">
</div>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <body class="antialiased font-sans bg-gray-200">
        <div class="container mx-auto px-4 sm:px-8">
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table id="showsmall" class="min-w-full leading-normal">
                        <tbody>
                        @foreach($logs as $log)
                                <?php $data = [
                                'setting' => "small",
                            ] ?>
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <div class="flex items-center">
                                        <div class="ml-3">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                @cannot('supervisor on')
                                                    <a class="link"
                                                       href="/admin/request/{{ $log->user_id }}/edit">{{ $log->user->name }} </a>
                                                @endcannot
                                                @can('supervisor on')
                                                    <a class="text-decoration-underline text-orange-500"
                                                       href="/admin/request/{{ $log->user_id }}/edit">{{ $log->user->name }} </a>
                                                @endcan
                                                @if($log->logtype == 'newuser')
                                                    created user
                                                    '{{ $log->createduser->name }}'
                                                    on {{ $log->createduser->created_at }}
                                                @elseif($log->logtype == 'deleted')
                                                    @include('custom_components.log_deleted')
                                                @elseif($log->logtype == 'request')
                                                    @include('custom_components.log_editrequest')
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <table id="showwide" class="min-w-full leading-normal hidden">
        <thead>
        <tr>
            <th
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                User
            </th>
            <th
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Email
            </th>
            <th
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Type
            </th>
            <th
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Date
            </th>
            <th
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-red-600 uppercase tracking-wider">
                Changes
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($logs as $log)
                <?php $data = [
                'setting' => "wide",
            ] ?>
            <tr>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <div class="flex items-center">
                        <div class="ml-3">
                            <p class="text-gray-900 whitespace-no-wrap">
                                @cannot('supervisor on')
                                    <a class="link"
                                       href="/admin/request/{{ $log->user_id }}/edit">{{ $log->user->name }} </a>
                                @endcannot
                                @can('supervisor on')
                                    <a class="text-decoration-underline text-orange-500"
                                       href="/admin/request/{{ $log->user_id }}/edit">{{ $log->user->name }} </a>
                                @endcan
                            </p>
                        </div>
                    </div>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <p class="text-gray-900 whitespace-no-wrap">{{ $log->user_email }}</p>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    @if($log->logtype == 'request')
                        <span class="text-green-500">{{ $log->logtype }}</span>
                    @elseif($log->logtype == 'deleted')
                        <span class="text-red-500">{{ $log->logtype }}</span>
                    @elseif($log->logtype == 'newuser')
                        <span class="text-green-500">Created</span>
                    @endif
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <p class="text-gray-900 whitespace-no-wrap">
                        {{ $log->created_at }}
                    </p>
                </td>
                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                    <p class="text-gray-900 whitespace-no-wrap">
                        @if($log->logtype == 'deleted')
                            @include('custom_components.log_deleted' , $data)
                        @endif
                        @if($log->logtype == 'request')
                            @include('custom_components.log_editrequest' , $data)
                        @endif
                        @if($log->logtype == 'newuser')
                            Created User
                        @endif
                    </p>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
</div>
</div>
</div>
</body>
</div>
</div>
</div>
</div>
</main>

<script>
    // Get the modal
    var modal = document.getElementById("showwide");
    var normal = document.getElementById("showsmall");

    // Get the button that opens the modal
    var btn = document.getElementById("logwide");

    // Get the <span> element that closes the modal
    var span = document.getElementById("logsmall");

    // When the user clicks the button, open the modal
    btn.onclick = function () {
        modal.style.display = "table";
        normal.style.display = "none";
        span.classList.remove("active")
        btn.classList.add("active")

    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
        normal.style.display = "table";
        btn.classList.remove("active")
        span.classList.add("active")

    }
</script>
@else
@include('custom_components.closed_function')
@endif

