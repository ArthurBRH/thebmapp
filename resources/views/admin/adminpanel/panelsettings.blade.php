{{--<div class="card-grid mt-[1.5rem]">--}}
@foreach($settings as $setting)
    @can($setting->permission)
    <article class="card panel.permissions">
        <div class="card-header">
            <div>
                <span><img src="https://assets.codepen.io/285131/figma.svg"/></span>
                <h3>{{ $setting->title }}</h3>
            </div>
            <form id="toggle{{ $setting->id }}" action="/setting/{{ $setting->id }}/toggle" method="post">
                @csrf
                <label class="toggle">
                    <label class="toggle">

                        @if($setting->status === 'true')
                            <input onchange="document.getElementById('toggle{{ $setting->id }}').submit()" type="checkbox" checked>
                        @else
                            <input onchange="document.getElementById('toggle{{ $setting->id }}').submit()" type="checkbox">
                        @endif
                        <span></span>
                    </label>

                </label>
            </form>
        </div>
        <div class="card-body">
            <p>{{ $setting->description }}</p>
            <p>{{ $setting->permission }}</p>

        </div>
        <div class="card-footer">
            <a href="">Edit setting</a>
        </div>
    </article>
    @endcan
@endforeach

