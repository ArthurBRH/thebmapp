@if($request->status === '')
    <div href="#" class="block h-full rounded-lg NoStatus p-4">
        <strong class="font-medium">No Status</strong>
    </div>
@else
    <div href="#" class="block h-full rounded-lg {{ $request->status }} p-4">
        <strong class="font-medium">{{ $request->status }}</strong>
    </div>
@endif
