
<h1 class="primary text-center">Bmapp</h1>
<div class="bg-primary line"></div>
<table>
    <tbody class="center block">
    <tr class="text block">
        <th>Naam:</th><td> {{$request->user->name}}</td>
    </tr>
    <tr class="text block">
        <th>Datum:</th><td> {{$request->created_at}}</td>
    </tr>
    <tr class="text block">
        <th>Code:</th><td> RQ-{{$request->id}}</td>
    </tr>
    </tbody>
</table>
<div class="bg-primary line"></div>
<table>
    <tbody class="center block">
    <tr class="text block">
        <th>Email:</th><td> {{$request->user->email}}</td>
    </tr>
    <tr class="text block">
        <th>Baan:</th><td> {{$request->user->user_info->job}}</td>
    </tr>
    <tr class="text block">
        <th>Status:</th><td> {{$request->status}}</td>
    </tr>
    <tr class="text block">
        <th>Prio:</th><td> {{$request->prio}}</td>
    </tr>
    </tbody>
</table>
<div class="bg-primary line"></div>
<table>
    <tbody class="center block">
    <tr class="text block">
    <td>{{ $request->description }}</td>
    </tr>
    </tbody>
</table>
<table>
    <tbody class="">
    @foreach($logs as $log)
            <?php
            $log = \App\Models\Log_event::find($log->log_event_id);
            ?>
        <tr class="">
            <td>{{ $log->user->name }} eddited request: RQ-{{ $log->request->eddited_id }}</td>
<td>
                            <?php
                            $oldstatus = $log->request->old_status;
                            $newstatus = $log->request->new_status;
                            $oldprio = $log->request->old_prio;
                            $newprio = $log->request->new_prio; ?>
                        @if($oldstatus !== $newstatus)
                            <span class="editrequest {{ $oldstatus }}"> {{ $oldstatus }}</span> ->
                <span class="editrequest {{ $newstatus }}">{{ $newstatus }}</span>,
                        @endif
                        @if($oldprio!== $newprio)
                            <span class="editrequest {{ $oldprio }}"> {{ $oldprio }}</span> -> <span
                                class="editrequest {{ $newprio }}">{{ $newprio }}</span>,
                            @endif
            </td>

        </tr>
    @endforeach
    </tbody>
</table>
<div class="footer">
    <h2>Bmapp Requests @2023</h2>
</div>
<style>
    .Low {
        color: #00c2dc;
    }
    .Medium {
        color: #04d904;
    }
    .High {
        color: orange;
    }
    .Highest {
        color: red;
    }
    .Zero {
        color: gray;
    }

    /* prio colors */


    /* End prio colors */
    /* status colors */
    .Requested {
        color: #e59a5d;
    }
    .Active {
        color: green;
    }
    .Accepted {
        color: #60c5e8;
    }
    .NonUse {
        color: gray;
    }
    .Denied{
        color: #730505;
    }
    /* end status colors */
    th{
        width: 50%;
    }
    td{
        width: 50%;
    }
table {
    margin-left: 10%;
    width: 80%;
}
    .text {
        font-size: 25px;
    }
    .primary {
        color: rgb(28, 41, 152);
    }
    .bg-primary {
        background-color: rgb(28, 41, 152);
    }

    .line {
        width: 80%;
        margin-left: 10%;
        height: 2px;
        display: block;
    }
    .text-center {
        text-align: center;
    }
    .footer {
        bottom: 0;
        position: fixed;
    }
</style>
