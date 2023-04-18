@include('pages.navbar')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <body class="antialiased font-sans bg-gray-200">
                <div class="container mx-auto px-4 sm:px-8">
                    <div class="py-8">
                        <div>
                            <h2 class="text-2xl font-semibold leading-tight"><a class="link" href="/users">User</a> / {{ $user->id }}</h2>
                        </div>
                        <div class="grid">

                            <article class="rounded-xl border border-gray-200 bg-gray-100 p-4 w-96">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="icon icon-{{ $user->icon_color }} h-16 w-16 rounded-full object-cover">{{$user->icon}}</div>


                                    <div>
                                        <h3 class="text-lg font-medium">{{ $user->name }}</h3>

                                        <div class="flow-root">
                                            <ul class="-m-1 flex flex-wrap">
                                                <li class="p-1 leading-none">
                                                    <a href="/roles"
                                                       class="text-xs font-medium text-gray-700"> {{ $user->user_info->job }} </a>
                                                </li>

                                                <li class="p-1 leading-none">
                                                    <a href="#" class="text-xs font-medium text-gray-700"> </a>
                                                </li>

                                                <li class="p-1 leading-none">
                                                    <a href="#" class="text-xs font-medium text-gray-700"></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <ul class="mt-4 space-y-2">
                                    <li>
                                        @if($user->is_active === '')
                                            <div href="#" class="block h-full rounded-lg NoStatus p-4">
                                                <strong class="font-medium">No Status</strong>
                                            </div>
                                        @else
                                            <div href="#" class="block h-full rounded-lg {{ $user->is_active }} p-4">
                                                <strong class="font-medium">{{ $user->is_active }}</strong>
                                            </div>
                                        @endif
                                    </li>

                                    <li>
                                        <div id="roles_del" class="block h-full rounded-lg border border-gray-700 p-4">
                                            <strong class="font-medium">Roles</strong>
                                            <button style="font-size: 20px; float: right" id="addroles"><i
                                                    class="fa-regular fa-square-plus"></i></button>
                                            <p class="mt-1 text-xs font-medium text-gray-700">
                                            <table class="w-[100%]">
                                                @can('supervisor on')
                                                    <th class="text-orange-500">Id:</th>
                                                @endcan
                                                <th>Naam:</th>
                                                <th>Guard:</th>
                                                <th>Remove</th>
                                                @foreach($user->roles as $role)
                                                    <tr>
                                                        @can('supervisor on')
                                                            <td>{{ $role->id }}</td>
                                                        @endcan
                                                        <td>{{ $role->name }}</td>
                                                        <td>{{ $role->guard_name }}</td>
                                                        <td>
{{--                                                            nvt--}}
                                                            <a href="/user/{{ $user->id }}/role/{{ $role->id }}/remove">Remove</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                            </p>
                                        </div>
                                        <div id="roles_add" class="block h-full rounded-lg border border-gray-700 p-4 hidden">
                                            <strong class="font-medium">Roles</strong>
                                            <button style="font-size: 20px; float: right" id="delroles"><i
                                                    class="fa-regular fa-square-minus"></i></button>
                                            <p class="mt-1 text-xs font-medium text-gray-700">
                                            <table class="w-[100%]">
                                                @can('supervisor on')
                                                    <th class="text-orange-500">Id:</th>
                                                @endcan
                                                <th>Naam:</th>
                                                <th>Guard:</th>
                                                <th>Add</th>
                                                @foreach($roles as $role)
                                                    @if($user->hasRole($role))
                                                        @else
                                                    <tr>
                                                        @can('supervisor on')
                                                            <td>{{ $role->id }}</td>
                                                        @endcan
                                                        <td>{{ $role->name }}</td>
                                                        <td>{{ $role->guard_name }}</td>
                                                        <td>
                                                            <a href="/user/{{ $user->id }}/role/{{ $role->id }}/add">add</a>
                                                        </td>
                                                    </tr>
                                                        @endif
                                                @endforeach
                                            </table>
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </article>


                            <article class="rounded-xl border border-gray-200 bg-gray-100 p-4 w-96">
                                <div class="flex items-center gap-4">


                                    <div>

                                    </div>
                                </div>

                                <ul class="mt-4 space-y-2">
                                    <li>
                                        <div href="#" class="block h-full bg-gray-300 rounded-lg p-4">
                                            <strong class="font-medium">Informatie</strong>
                                        </div>
                                    </li>

                                </ul>
                                <table>
                                    <form method="POST" action="/user/{{ $user->id }}/update" class="p-6">
                                        @csrf
                                        @method('put')
                                        <tr>
                                            <td>Email: </td>
                                            <td>{{ $user->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Aangemaakt op: </td>
                                            <td>{{ $user->created_at->format('j, m, Y') }}</td>
                                        </tr>
                                        <tr>
                                            <td><label for="job">contract:</label></td>
                                            <td><input class="h-[28px] w-[150px]" type="text" id="job" name="job" value="{{ $user->user_info->job }}" required></td>
                                        </tr>
                                        <tr>
                                            <td><label for="color">Kleur:</label></td>
                                            <td>
                                                <span class="kleur-{{ $user->user_info->color }}">
                                                <select class="select"  id="color" name="color">
                                                    <option value="{{ $user->user_info->color }}">{{ $user->user_info->color }}</option>
                                                    <option value="red">Red</option>
                                                    <option value="blue">Blue</option>
                                                    <option value="orange">Orange</option>
                                                    <option value="green">Green</option>
                                                    <option value="black">Black</option>
                                                    <option value="teal">Teal</option>
                                                    <option value="amber">Amber</option>

                                                </select>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="is_active">Status:</label></td>
                                            <td>
                                                <select class="select" id="is_active" name="is_active">
                                                    <option
                                                        value="{{ $user->is_active }}">{{ $user->is_active }}</option>
                                                    <option value="Active">Active</option>
                                                    <option value="Inactive">Inactive</option>
                                                    <option value="Suspended">Suspended</option>
                                                    <option value="nostatus">No Status</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><button class="button"><span>Submit</span></button></td>
                                        </tr>
                                    </form>

                                </table>
                            </article>
                            <article class="rounded-xl border border-gray-200 bg-gray-100 p-4 w-96">
                                <div class="flex items-center gap-4">


                                    <div>

                                    </div>
                                </div>

                                <ul class="mt-4 space-y-2">
                                    <li>
                                        <div href="#" class="block h-full bg-gray-300 rounded-lg p-4">
                                            <strong class="font-medium">Permissions</strong>
                                        </div>
                                    </li>

                                    <div id="perm_del" class="block h-full rounded-lg border border-gray-700 p-4">
                                        <strong class="font-medium">Permissions</strong>
                                        <button style="font-size: 20px; float: right" id="myBtn"><i
                                                class="fa-regular fa-square-plus"></i></button>
                                        <p class="mt-1 text-xs font-medium text-gray-700">
                                        <table class="w-[100%]">
                                            @can('supervisor on')
                                                <th class="text-orange-500">Id:</th>
                                            @endcan
                                            <th class="w-[50%]">Naam:</th>
                                            <th>Guard:</th>
                                            <th>Remove</th>
                                            @foreach($user->permissions as $perm)
                                                <tr>
                                                    @can('supervisor on')
                                                        <td>{{ $perm->id }}</td>
                                                    @endcan
                                                    <td class="w-[50%]">{{ $perm->name }}</td>
                                                    <td>{{ $perm->guard_name }}</td>
                                                    <td class="remove-td"><a
                                                            href="/user/{{ $user->id }}/perm/{{ $perm->id }}/remove">Remove</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                        </p>
                                    </div>
                                    <div id="perm_add" class="block h-full rounded-lg border border-gray-700 p-4">
                                        <strong class="font-medium">Permissions</strong>
                                        <button style="font-size: 20px; float: right" id="close"><i
                                                class="fa-regular fa-square-minus"></i></button>

                                        <p class="mt-1 text-xs font-medium text-gray-700">
                                        <table class="w-[100%]">
                                            @can('supervisor on')
                                                <th class="text-orange-500">Id:</th>
                                            @endcan
                                            <th class="w-[50%]">Naam:</th>
                                            <th>Guard:</th>
                                            <th>Add</th>
                                            @foreach($permissions as $role)
                                                    @if($user->hasPermissionTo($role))
                                                    @else
                                                <tr>
                                                    @can('supervisor on')
                                                        <td>{{ $role->id }}</td>
                                                    @endcan
                                                    <td>{{ $role->name }}</td>
                                                    <td>{{ $role->guard_name }}</td>
                                                    <td>
                                                        <a href="/user/{{ $user->id }}/perm/{{ $role->id }}/add">Add</a>
                                                    </td>
                                                </tr>
                                                    @endif
                                            @endforeach
                                        </table>
                                        </p>
                                    </div>
                                </ul>
                            </article>
                        </div>
                    </div>
                </div>
                </body>
            </div>
        </div>
    </div>
    </div>
{{--@foreach($user->user_setting as $setting)--}}
{{--    @if($setting->setting_id === 1)--}}
{{--        <label class="toggle">--}}

{{--            @if($setting->status === 'true')--}}
{{--                <input type="checkbox" checked>--}}
{{--            @else--}}
{{--                <input type="checkbox">--}}
{{--            @endif--}}
{{--            <span></span>--}}
{{--        </label>--}}
{{--    @endif--}}
{{--@endforeach--}}
<script>
    // Get the modal
    var modal = document.getElementById("perm_add");
    var normal = document.getElementById("perm_del");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementById("close");

    // When the user clicks the button, open the modal
    btn.onclick = function () {
        modal.style.display = "block";
        normal.style.display = "none";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
        normal.style.display = "block";
    }




    // Get the rolemodal
    var rolesmodal = document.getElementById("roles_add");
    var rolesnormal = document.getElementById("roles_del");

    // Get the button that opens the modal
    var rolesbtn = document.getElementById("addroles");

    // Get the <span> element that closes the modal
    var rolesspan = document.getElementById("delroles");

    // When the user clicks the button, open the modal
    rolesbtn.onclick = function () {
        rolesmodal.style.display = "block";
        rolesnormal.style.display = "none";
    }

    // When the user clicks on <span> (x), close the modal
    rolesspan.onclick = function () {
        rolesmodal.style.display = "none";
        rolesnormal.style.display = "block";
    }
</script>
