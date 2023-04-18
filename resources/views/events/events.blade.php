<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Events') }}
        </h2>
    </x-slot>
    @vite(['resources/js/app.js'])

    {{--    <div class="py-12">--}}
    {{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
    {{--            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">--}}
    {{--                @foreach($events as $event)--}}
    {{--                    Titel: {{ $event->title }}--}}
    {{--                    <br>--}}
    {{--                    Creator: {{ $event->creator_id }}--}}
    {{--                    <br>--}}
    {{--                    Datum: {{ $event->event_detail->date }}--}}
    {{--                    <br>--}}
    {{--                    begin: {{ $event->event_detail->begin_time }}--}}
    {{--                    <br>--}}
    {{--                    @foreach($event->event_user as $user)--}}
    {{--                        Extra User: {{ $user->user_id }}--}}
    {{--                        <br>--}}
    {{--                    @endforeach--}}
    {{--                @endforeach--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <body class="bg-gray-200">
    <div class="container mx-auto mt-10" style="overflow-y: auto; max-height: 100vh;">


        <div class="wrapper bg-white rounded shadow w-full ">
            <div class="header flex justify-between border-b p-2">
        <span class="text-lg font-bold">
          <?php echo date('M Y') ?>
        </span>
                <div class="relative">
                    <div
                            class="appearance-none h-full rounded-r rounded-l sm:rounded-l-none border block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <a id="events-modal_open" class="cursor-pointer text-primary"><i class="fa-solid fa-plus"></i>
                            Create New</a>


                    </div>
                </div>
                <div class="buttons">
                    <button class="p-1">
                        <svg width="1em" fill="gray" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-circle"
                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path fill-rule="evenodd"
                                  d="M8.354 11.354a.5.5 0 0 0 0-.708L5.707 8l2.647-2.646a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708 0z"/>
                            <path fill-rule="evenodd"
                                  d="M11.5 8a.5.5 0 0 0-.5-.5H6a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5z"/>
                        </svg>
                    </button>
                    <button class="p-1">
                        <svg width="1em" fill="gray" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right-circle"
                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path fill-rule="evenodd"
                                  d="M7.646 11.354a.5.5 0 0 1 0-.708L10.293 8 7.646 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0z"/>
                            <path fill-rule="evenodd" d="M4.5 8a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                    </button>
                </div>
            </div>

            <table onload="function myFunction() {
    var element = document.getElementById('08:00');
            element.scrollIntoView();
            }" class="w-full">
                <?php
                $skips = ['00:00', '00:30', '01:00', '01:30', '02:00', '02:30', '03:00', '03:30', '04:00', '04:30', '00:30', '00:30', '00:30', '00:30', '00:30', '00:30',]
                ?>
                <thead>
                <tr class="top-0 bg-white pos-stick">
                    @foreach($week as $date)
                            <?php
                            $timestamp = strtotime($date);
                            $days = date('l', $timestamp);

                            $day = strtotime($date);
                            $day = date('d', $day);
                            ?>
                        <th class="border-sides p-2 h-10 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 xl:text-sm text-xs">
                            <span class="xl:block lg:block md:block sm:block hidden">{{ $day }} {{ $days }}</span>
                            <span class="xl:hidden lg:hidden md:hidden sm:hidden block">Sun</span>
                        </th>
                    @endforeach
                </tr>
                </thead>
                @foreach($events as $event)
                    {{$event->title}}
                @endforeach
                <tbody>
                <div style="overflow-y: auto; max-height: 100vh;">
                    <tr class="text-center h-[35rem]">
                        @foreach($week as $day)

                            <td class="border-sides p-1 xl:w-40 lg:w-30 md:w-30 sm:w-20 w-10 overflow-auto transition cursor-pointer duration-500 ease hover:bg-gray-300 ">
                                <div class="flex flex-col mx-auto xl:w-40 lg:w-30 md:w-30 sm:w-full w-10 mx-auto overflow-hidden">
                                    <div class="flex-grow h-30 w-full cursor-pointer">
                                        <span class="bottom-text-agenda text-[7px]"></span>
                                            <?php
                                            $day = strtotime($day);
                                            $day = date('d', $day);
                                            ?>
                                        @foreach($events as $event)
                                                <?php
                                                $begintime = strtotime($event->event_detail->begin_time);
                                                $begintime = date('H:i', $begintime);
                                                $endtime = strtotime($event->event_detail->end_time);
                                                $endtime = date('H:i', $endtime);
                                                $eventday = strtotime($event->event_detail->date);
                                                $eventday = date('d', $eventday);
                                                ?>
                                            @if($day === $eventday)
                                                <div onclick="myFunction()"
                                                     class="event bg-purple-400 text-white rounded p-1 text-sm mb-1">
                                                    <span class="event-name">{{ $event->title }}</span><br>
                                                    <span class="time">{{ $begintime }} ~ {{ $endtime }}</span>
                                                    {{--                                                                        @foreach($event->event_user as $user)--}}
                                                    {{--                                                                            Extra User: {{ $user->user_id }}--}}
                                                    {{--                                                                            <br>--}}
                                                    {{--                                                                        @endforeach--}}
                                                </div>
                                            @endif
                                        @endforeach

                                    </div>
                                </div>
                            </td>
                        @endforeach
                    </tr>
                </div>
                </tbody>
            </table>
        </div>
    </div>
    </body>
    @include('custom_components.events_add_modal')
    </html>
</x-app-layout>
<script>

    // Get the modal
    let modalevents = document.getElementById("events-modal-create");

    // Get the <span> element that closes the modal
    let spanevents = document.getElementById("events-modal_close");

    // Get the <a> element that opens the modal
    let aevents = document.getElementById("events-modal_open");

    let container = document.getElementsByClassName("container");

    let modalinfo = document.getElementById("events-modal-info");
    let spaninfo = document.getElementById("events-modal_info_close");
    let ainfo = document.getElementById("events-info_open");

    // When the user clicks on <span> (x), close the modal
    spanevents.onclick = function () {
        modalevents.style.display = "none";
        document.body.classList.remove('modalactive');

    }
    // When the user clicks on <a> (+ Create new), Opens the modal
    aevents.onclick = function () {
        modalevents.style.display = "block";
        document.body.classList.add('modalactive');
    }

    // When the user clicks on <span> (x), close the modal
    spaninfo.onclick = function () {
        modalinfo.style.display = "none";
        document.body.classList.remove('modalactive');

    }
    // When the user clicks on <a> (+ Create new), Opens the modal
    ainfo.onclick = function () {
        console.log('hoi');
        modalinfo.style.display = "block";
        document.body.classList.add('modalactive');
    }

    function myFunction() {
        console.log('hoi');
        modalinfo.style.display = "flex";
        modalinfo.style.alignItems = "center";
        document.body.classList.add('modalactive');
    }

</script>
