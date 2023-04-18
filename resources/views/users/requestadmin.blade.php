<?php
include(app_path() . '/includes/phpincludes.blade.php');

?>
@include('admin.adminheader')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <body class="antialiased font-sans bg-gray-200">
                <div class="container mx-auto px-4 sm:px-8">
                    <div class="py-8">
                        <div>
                            <h2 class="text-2xl font-semibold leading-tight"><a class="link" href="/admin/requests">Request</a>
                                / {{ $request->id }} </h2>
                        </div>
                        <div class="grid">

                            <article class="rounded-xl border border-gray-200 bg-gray-100 p-4 w-96">
                                <div class="flex items-center gap-4">
                                    <div
                                            class="icon icon-{{ $request->user->icon_color }} h-16 w-16 rounded-full object-cover">{{$request->user->icon}}</div>


                                    <div>
                                        <h3 class="text-lg font-medium">{{$request->user->name}}</h3>

                                        <div class="flow-root">
                                            <ul class="-m-1 flex flex-wrap">
                                                <li class="p-1 leading-none">
                                                    <a class="text-xs font-medium text-gray-700"> {{$request->user->email}} </a><br>
                                                    <a class="text-xs font-medium text-gray-700"> {{$request->user->user_info->job}} </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <ul class="mt-4 space-y-2">
                                    @include('custom_components.status_request_tile')
                                    <li>
                                        <div href="#" class="block h-full rounded-lg  p-4">
                                            <strong class="font-medium">{{ $request->description }}</strong>
                                        </div>
                                    </li>

                                </ul>
                            </article>
                            <article class="rounded-xl border border-gray-200 bg-gray-100 p-4 w-96">
                                <div class="flex items-center gap-4">
                                    <div>
                                        <h3 class="text-lg font-medium">Suggestions</h3>

                                        <div class="flow-root">
                                            <ul class="-m-1 flex flex-wrap">
                                                <li class="p-1 leading-none">
                                                    <a
                                                            class="text-xs font-medium text-gray-700"> </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <ul class="mt-4 space-y-2">
                                    <li>
                                        <div href="#" class="block h-full rounded-lg  p-4">
                                            @foreach($suggested as $suggest)
                                                @foreach($suggest as $sug)
                                                    @if($request->user->hasRole($sug->name))
                                                        User already has the {{ $sug->name }} role<br>
                                                    @else
                                                        Add the <a
                                                                href="/user/{{$request->user->id}}/role/{{ $sug->id }}/add"
                                                                class="link font-medium text-gray-700">{{ $sug->name }}</a>
                                                        role<br>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </div>
                                    </li>

                                </ul>
                            </article>
                            <article class="rounded-xl border border-gray-200 bg-gray-100 p-4 w-96">
                                <div class="flex items-center gap-4">
                                    <div>
                                        <h3 class="text-lg font-medium">Status</h3>

                                        <div class="flow-root">
                                            <ul class="-m-1 flex flex-wrap">
                                                <li class="p-1 leading-none">
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <ul class="mt-4 space-y-2">
                                    <li>
                                        Edit <a href="/user/{{$request->user->id}}/edit"
                                                class="link font-medium text-gray-700">{{ $request->user->name }}</a><br>
                                        <a class="link" href="{{route('pdf.pdf', $request->id)}}">Download PDF</a><br>
                                        @if($request->status == 'Accepted' || $request->status == 'Denied')
                                            <a class="link" href="/admin/request/{{$request->id}}/delete">Delete
                                                request</a>
                                        @else
                                            To delete this request set the status to denied or accepted
                                        @endif
                                    </li>
                                    <li>
                                        <table>
                                            <form method="POST" action="/admin/request/{{$request->id}}/update"
                                                  class="p-6">
                                                @csrf
                                                @method('put')

                                                <tr>
                                                    <td><label for="status">Status:</label></td>
                                                    <td>
                                                        <select class="select" id="status" name="status">
                                                            <option
                                                                    value="{{$request->status}}">{{$request->status}}</option>
                                                            @foreach($requeststatus as $status)
                                                                @if($status === $request->status)
                                                                @else
                                                                    <option value="{{$status}}">{{$status}}</option>
                                                                @endif
                                                            @endforeach

                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label for="prio">Prio:</label></td>
                                                    <td>
                                                        <select class="select" id="prio" name="prio">
                                                            <option
                                                                    value="{{$request->prio}}">{{$request->prio}}</option>
                                                            @foreach($requestprio as $prio)
                                                                @if($prio === $request->prio)
                                                                @else
                                                                    <option value="{{$prio}}">{{$prio}}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <button class="button"><span>Submit</span></button>
                                                    </td>
                                                </tr>
                                            </form>
                                        </table>
                                    </li>
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

