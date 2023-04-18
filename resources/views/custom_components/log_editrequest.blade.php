<?php
$request = \App\Models\Admin_contact::find($log->request->eddited_id);
?>

@if($request != NULL)
    Eddited request: <a class="link" href="/admin/request/{{ $log->request->eddited_id }}/edit">{{ $log->request->eddited_id }}</a>
    @foreach($data as $data)
        @if($data === 'wide')
            <br>
        @endif
    @endforeach
@else
    Eddited request: <a class="text-red-500" >{{ $log->request->eddited_id }}</a>
    @foreach($data as $data)
        @if($data === 'wide')
            <br>
        @endif
    @endforeach
@endif

<?php
$oldstatus = $log->request->old_status;
$newstatus = $log->request->new_status;
$oldprio = $log->request->old_prio;
$newprio = $log->request->new_prio;


?>



@if($oldstatus !== $newstatus)
    <span class="editrequest {{ $oldstatus }}"> {{ $oldstatus }}</span> -> <span
        class="editrequest {{ $newstatus }}">{{ $newstatus }}</span>,
@endif
@if($oldprio!== $newprio)
    <span class="editrequest {{ $oldprio }}"> {{ $oldprio }}</span> -> <span
        class="editrequest {{ $newprio }}">{{ $newprio }}</span>,
@endif



