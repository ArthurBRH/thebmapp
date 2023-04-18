@include('pages.navbar')
    @vite(['resources/js/app.js', 'resources/css/chat.css'])
    @foreach($group as $group)
        @can($group->permission)


                    <div class="py-12 pb-3">

                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" role="alert">
                            <div class="border-t-4 border-blue-400 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6">
                                    <span>{{ $group->name }} <i class="text-blue-300 text-[30px] {{ $group->icon }}"></i></span>
                                    <div></div>
                                    <div>{{ $group->description }}</div>
                                </div>
{{--                                <div class="p-6">--}}
{{--                                    Message--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
            <body class="bg-gray-200">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <body class="antialiased font-sans bg-gray-200">
                        <div class="container mx-auto px-4 sm:px-8">
                            <div class="py-8">
                                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                                    <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                                        <table class="min-w-full leading-normal">
                                            <thead>
                                            <tr>
                                                <th
                                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                    Naam
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <div class="flex items-center">
                                                        <div class="flex-shrink-0 w-10 h-10">
                                                            <div>
                                                                <i class="text-[30px] {{ $group->icon }}"></i>
                                                            </div>
                                                        </div>
                                                        <div class="ml-3">
                                                            <p class="text-gray-900 whitespace-no-wrap">
                                                                <a class="link"
                                                                   href="/group/{{ $group->id }}/settings"> {{ $group->name }} </a>

                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>
                                        </table>
                                        <table class="min-w-full leading-normal">
                                            <section class="chat">
                                                <div class="messages-chat">

                                                @foreach($messages as $message)
                                                        @if($message->user->id === \Illuminate\Support\Facades\Auth::user()->id)
                                                            <div class="message text-only">
                                                                                                                        <div class="response">
                                                                                                                            <p class="text">{{ $message->message }}</p>
                                                                                                                        </div>
                                                                                                                    </div>
                                                            <p class="time float-right">{{ $message->created_at }}</p>
                                                        @else
                                                            <div class="message">
                                                                <div
                                                                    class="icon icon-{{ $message->user->icon_color }}">{{ $message->user->icon }}</div>
                                                                {{ $message->user->name  }}   <p class="text">{{ $message->message }}</p>
                                                            </div>
                                                                                                                <p class="time">{{ $message->created_at }}</p>
                                                                @endif

                                                @endforeach
                                                </div>
                                            </section>
                                            </tbody>
{{--                                            <div class="footer-chat">--}}
{{--                                                <i class="icon fa fa-smile-o clickable" style="font-size:25pt;" aria-hidden="true"></i>--}}
{{--                                                <input type="text" class="write-message" placeholder="Type your message here"></input>--}}
{{--                                                <i class="icon send fa fa-paper-plane-o clickable" aria-hidden="true"></i>--}}
{{--                                            </div>--}}
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                        </body>
                    </div>
                </div>
            </div>
            </body>
            @endcan
            @cannot($group->permission)
                @include('custom_components.403')
            @endcannot
            @endforeach
            </body>
            </html>
