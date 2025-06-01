<div class="row text-center mb-3">
    @php
        $routeName = Route::currentRouteName();
        $title = explode('.', $routeName)[0];
    @endphp
    <h3>Data {{ $title === 'home' ? '' : ucfirst($title) }}</h3>
</div>
