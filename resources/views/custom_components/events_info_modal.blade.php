<div id="events-modal-info" class="modalevent">
<article class="rounded-xl border border-gray-200 bg-gray-100 p-4 w-96 event-article">
                                <div class="flex items-center gap-4">
                                    <div class="">    <span id="events-modal_info_close" class="cursor-pointer text-[30px]">X</span>
                                    </div>


<div>
    <h3 class="text-lg font-medium">{{ $event->title }}</h3>

    <div class="flow-root">
        <ul class="-m-1 flex flex-wrap">
            <li class="p-1 leading-none">
{{--                {{ dump($event->id )}}--}}

            @foreach($users as $user)
                    @if($user->event_id === $event->id)
                        <a href="/roles"
                           class="text-xs font-xxlarge text-gray-700">{{ $user->user_id }}</a>
                    @endif
                @endforeach
            </li>
        </ul>
    </div>
</div>
</div>

<ul class="mt-4 space-y-2">
    <li>
            <div href="#" class="block h-full rounded-lg NoStatus p-4">
                <strong class="font-medium">No Status</strong>
            </div>
    </li>

    <li>
        <div href="#" class="block h-full rounded-lg border border-gray-700 p-4">
            <strong class="font-medium">Roles</strong>
            <p class="mt-1 text-xs font-medium text-gray-700">
            <table class="w-[100%]">
                @can('supervisor on')
                    <th class="text-orange-500">Id:</th>
                @endcan
                <th>Naam:</th>
                <th>Guard:</th>
                <th>Remove</th>
                    <tr>
                        @can('supervisor on')
                            <td></td>
                        @endcan
                        <td></td>
                        <td></td>
                        <td>
                            nvt
                            {{--                                                            <a href="/user/{{ $user->id }}/role/{{ $role->id }}/remove">Remove</a>--}}
                        </td>
                    </tr>
            </table>
            </p>
        </div>
    </li>
</ul>
</article>
</div>
