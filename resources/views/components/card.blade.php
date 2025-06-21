<div class="card mb-3">
    @if (isset($header))
        <div class="card-header d-flex justify-content-end align-items-center">
            {{ $header }}
        </div>
    @endif

    <div class="card-body">
        {{ $slot }}
    </div>
</div>
