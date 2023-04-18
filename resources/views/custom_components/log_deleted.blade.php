Deleted request: <span class="text-red-500">{{ $log->logdeleted->request_id }}</span> from User: {{ $log->logdeleted->user_id }}
@foreach($data as $data)
@if($data === 'wide')
    <br>
@endif
@endforeach
with status: <span class="editrequest {{ $log->logdeleted->status }}"> {{ $log->logdeleted->status }}</span>
and prio: <span class="editrequest {{ $log->logdeleted->prio }}"> {{ $log->logdeleted->prio }}</span>


