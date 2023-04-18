<div class="prio">
    @if($request->prio === 'Low')
        <i class="text-blue-300 fa-solid fa-tag"></i>
    @elseif($request->prio === 'Medium')
        <i class="text-green-400 fa-solid fa-tag"></i>
    @elseif($request->prio === 'High')
        <i class="text-yellow-500 fa-solid fa-tag"></i>
    @elseif($request->prio === 'Highest')
        <i class="text-red-400 fa-solid fa-tag"></i>
    @else
        <i class="text-gray-200 fa-solid fa-tag"></i>
    @endif
</div>
