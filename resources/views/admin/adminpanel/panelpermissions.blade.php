{{--<div class="card-grid mt-[1.5rem]">--}}
    @foreach($permissions as $permission)
<article class="card panel.permissions">
    <div class="card-header">
        <div>
            <span><img src="https://assets.codepen.io/285131/figma.svg" /></span>
            <h3>{{ $permission->name }}</h3>
        </div>
        <label class="toggle">
            <input type="checkbox" checked>
            <span></span>
        </label>
    </div>
    <div class="card-body">
        <p>{{ $permission->guard_name }}</p>
        <p>{{ $permission->created_at }}</p>

    </div>
    <div class="card-footer">
        <a href="/permissions">Edit permission</a>
    </div>
</article>
    @endforeach

