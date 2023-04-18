{{--<div class="card-grid mt-[1.5rem]">--}}
    @foreach($roles as $role)
<article class="card panel.roles">
    <div class="card-header">
        <div>
            <span><img src="https://assets.codepen.io/285131/zeplin.svg" /></span>
            <h3>{{ $role->name }}</h3>
        </div>
        <label class="toggle">
            <input type="checkbox" checked>
            <span></span>
        </label>
    </div>
    <div class="card-body">
        <p>{{ $role->guard_name }}</p>
        <p>{{ $role->created_at }}</p>

    </div>
    <div class="card-footer">
        <a href="/roles/{{ $role->id }}/edit">Edit Role</a>
    </div>
</article>
    @endforeach
{{--</div>--}}
