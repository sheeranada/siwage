<div class="row mb-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                @php
                    $routeName = Route::currentRouteName();
                    $breadcrumb = explode('.', $routeName)[0];
                @endphp
                {{ $breadcrumb === 'home' ? '' : ucfirst($breadcrumb) }}
            </li>
        </ol>
    </nav>
</div>
