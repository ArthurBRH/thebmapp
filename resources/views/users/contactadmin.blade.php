@include('pages.navbar')

@if($setting->status === 'true')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class=" overflow-hidden ">
                    <body class="antialiased font-sans bg-gray-200">
                    <div class="container mx-auto px-4 sm:px-8">
                        <div class="py-8">

                            <div class="grid-1 justify-center align-content-center">

                                <article class="bg-white rounded-xl border border-gray-200 bg-gray-100 p-4 w-96">
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="icon icon-{{ $user->icon_color }} h-16 w-16 rounded-full object-cover">{{$user->icon}}</div>


                                        <div>
                                            <h3 class="text-lg font-medium">{{ $user->name }}</h3>

                                            <div class="flow-root">
                                                <ul class="-m-1 flex flex-wrap">
                                                    <li class="p-1 leading-none">
                                                        <a
                                                            class="text-xs font-medium text-gray-700"> {{ $user->user_info->job }} </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <ul class="mt-4 space-y-2">
                                        <li>
                                            @if($user->is_active === '')
                                                <div href="#" class="block  rounded-lg NoStatus p-4">
                                                    <strong class="font-medium">No Status</strong>
                                                </div>
                                            @else
                                                <div href="#"
                                                     class="block rounded-lg {{ $user->is_active }} p-4">
                                                    <strong class="font-medium">{{ $user->is_active }}</strong>
                                                </div>
                                            @endif
                                        </li>

                                        <li>
                                            <div href="#" class="block rounded-lg border border-gray-700 p-4">
                                                <strong class="font-medium">Aanvraag</strong>
                                                Max 250 tekens,
                                                <form method="POST" action="/user/{{ $user->id }}/contact" class="p-6">
                                                    @csrf
                                                    @method('post')

                                                    <tr>
                                                        <td><input class="h-[28px] w-[150px]" type="text"
                                                                   id="description" name="description"
                                                                   placeholder="Tekst..." required></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <button class="button"><span>Submit</span></button>
                                                        </td>
                                                    </tr>
                                                </form>
                                            </div>
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
    @else
        <div class="py-12 pb-3">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" role="alert">
                <div class="border-l-4 text-red-400 border-red-400 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        Je kan op dit moment geen aanvraag doen

                    </div>
                </div>
            </div>
        </div>
    @endif

