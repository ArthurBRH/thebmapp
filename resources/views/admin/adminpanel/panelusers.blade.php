{{--<div class="card-grid mt-[1.5rem]">--}}
    @foreach($users as $user)
        <article class="card panel.users">
            <div class="card-header">
                <div>
                    <div class="nav-icon icon icon-{{ $user->icon_color }}">{{ $user->icon }}</div>
                    <h3>{{ $user->name }}</h3>
                </div>
                <label class="toggle">
                    @if($user->is_active == 'Active')
                        <input type="checkbox" checked>
                    @else
                        <input type="checkbox">
                    @endif
                    <span></span>
                </label>
            </div>
            <div class="card-body">
                <p>Email: {{ $user->email }}</p>
                <p>Contract: {{ $user->user_info->job}}</p>
            </div>
            <div class="card-footer">
                <a href="/user/{{ $user->id }}/edit">Edit user</a>
            </div>
        </article>
    @endforeach
