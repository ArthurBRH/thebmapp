<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>
    {{--    @include('Blocks.modal')--}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <body class="antialiased font-sans bg-gray-200">
                <div class="container mx-auto px-4 sm:px-8">
                    <div class="py-8">
                        <div>
                            <h2 class="text-2xl font-semibold leading-tight">Group / {{ $group->id }}</h2>
                        </div>
                        <div class="grid">

                            <article class="rounded-xl border border-gray-200 bg-gray-100 p-4 w-96">
                                <div class="flex items-center gap-4">
                                    <i class="text-[30px] {{ $group->icon }}"></i>


                                    <div>
                                        <h3 class="text-lg font-medium"><a class="link"
                                                                           href="/group/{{ $group->id }}/chat"> {{ $group->name }} </a></h3>

                                        <div class="flow-root">
                                            <ul class="-m-1 flex flex-wrap">
                                                <li class="p-1 leading-none">
                                                    <a class="text-xs font-medium text-gray-700"> {{ $group->description }} </a>
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
                                    {{--                                    <li>--}}
                                    {{--                                        @if($user->is_active === '')--}}
                                    {{--                                            <div href="#" class="block h-full rounded-lg NoStatus p-4">--}}
                                    {{--                                                <strong class="font-medium">No Status</strong>--}}
                                    {{--                                            </div>--}}
                                    {{--                                        @else--}}
                                    {{--                                            <div href="#" class="block h-full rounded-lg {{ $user->is_active }} p-4">--}}
                                    {{--                                                <strong class="font-medium">{{ $user->is_active }}</strong>--}}
                                    {{--                                            </div>--}}
                                    {{--                                        @endif--}}
                                    {{--                                    </li>--}}

                                    <li><div href="#" class="block h-full rounded-lg border border-gray-700 p-4">
                                            <strong class="font-medium">Users</strong>
                                            <p class="mt-1 text-xs font-medium text-gray-700">

                                            <table class="w-[100%]">
                                                @can('supervisor on')
                                                    <th class="text-orange-500">Id:</th>
                                                @endcan
                                                <th>Naam:</th>
                                                <th>Email:</th>
                                                <th>Add</th>
                                                @foreach($users as $user)
                                                    @if($user->hasPermissionTo($group->permission))
                                                        @else
                                                            <tr>
                                                                @can('supervisor on')
                                                                    <td>{{ $user->id }}</td>
                                                                @endcan
                                                                <td>{{ $user->name }}</td>
                                                                <td>{{ $user->email }}</td>
                                                                <td>
                                                                    <a class="link" href="/groups/{{ $group->id }}/add/{{ $user->id }}">Add</a>
                                                                </td>
                                                            </tr>
                                                    @endif
                                                @endforeach
                                            </table>
                                            </p>
                                        </div>
                                        <div href="#" class="block h-full rounded-lg border border-gray-700 p-4">
                                            <strong class="font-medium">Users</strong>
                                            <p class="mt-1 text-xs font-medium text-gray-700">

                                            <table class="w-[100%]">
                                                @can('supervisor on')
                                                    <th class="text-orange-500">Id:</th>
                                                @endcan
                                                <th>Naam:</th>
                                                <th>Email:</th>
                                                <th>Remove</th>
                                                @foreach($users as $user)
                                                    @if($user->hasPermissionTo($group->permission))
                                                        <tr>
                                                            @can('supervisor on')
                                                                <td>{{ $user->id }}</td>
                                                            @endcan
                                                            <td>{{ $user->name }}</td>
                                                            <td>{{ $user->email }}</td>
                                                            <td>
                                                                <a class="link" href="/groups/{{ $group->id }}/remove/{{ $user->id }}">Remove</a>
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
                                    <form method="POST" action="/user/{{ $group->id }}/update" class="p-6">
                                        @csrf
                                        @method('put')
                                        <tr>
                                            <td>Email:</td>
                                            <td>{{ $group->id }}</td>
                                        </tr>
                                        <tr>
                                            <td>Aangemaakt op:</td>
                                            <td>  {{ $group->created_at->format('j, m, Y') }}</td>
                                        </tr>
                                        <tr>
                                            <td><label for="job">contract:</label></td>
                                            <td><input class="h-[28px] w-[150px]" type="text" id="job" name="job"
                                                       value="{{ $group->id }}" required></td>
                                        </tr>
                                        <tr>
                                            <td><label for="color">Kleur:</label></td>
                                            <td>
                                                {{--                                                <span class="kleur-{{ $user->user_info->color }}">--}}
                                                {{--                                                <select class="select"  id="color" name="color">--}}
                                                {{--                                                    <option value="{{ $user->user_info->color }}">{{ $user->user_info->color }}</option>--}}
                                                {{--                                                    <option value="red">Red</option>--}}
                                                {{--                                                    <option value="blue">Blue</option>--}}
                                                {{--                                                    <option value="orange">Orange</option>--}}
                                                {{--                                                    <option value="green">Green</option>--}}
                                                {{--                                                    <option value="black">Black</option>--}}
                                                {{--                                                    <option value="teal">Teal</option>--}}
                                                {{--                                                    <option value="amber">Amber</option>--}}

                                                {{--                                                </select>--}}
                                                {{--                                                </span>--}}
                                            </td>
                                        </tr>
                                        {{--                                        <tr>--}}
                                        {{--                                            <td><label for="is_active">Status:</label></td>--}}
                                        {{--                                            <td>--}}
                                        {{--                                                <select class="select" id="is_active" name="is_active">--}}
                                        {{--                                                    <option--}}
                                        {{--                                                        value="{{ $user->is_active }}">{{ $user->is_active }}</option>--}}
                                        {{--                                                    <option value="Active">Active</option>--}}
                                        {{--                                                    <option value="Inactive">Inactive</option>--}}
                                        {{--                                                    <option value="Suspended">Suspended</option>--}}
                                        {{--                                                    <option value="nostatus">No Status</option>--}}
                                        {{--                                                </select>--}}
                                        {{--                                            </td>--}}
                                        {{--                                        </tr>--}}
                                        <tr>
                                            <td></td>
                                            <td>
                                                <button class="button"><span>Submit</span></button>
                                            </td>
                                        </tr>
                                    </form>

                                </table>
                            </article>
                        </div>
                    </div>
                </div>
                </body>
            </div>
        </div>
    </div>
    </div>

</x-app-layout>
