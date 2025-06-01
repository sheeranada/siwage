{{-- @foreach (['success', 'error', 'warning', 'info'] as $msg)
    @if (session($msg))
        <div class="alert alert-{{ $msg === 'error' ? 'danger' : $msg }} alert-dismissible fade show" role="alert">
            <i class="fas fa-check"></i>
            <span>{{ session($msg) }}</span>
        </div>
    @endif
@endforeach

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
{{-- Alert session --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        @foreach (['success', 'error', 'warning', 'info'] as $msg)
            @if (session($msg))
                Swal.fire({
                    icon: '{{ $msg === 'error' ? 'error' : $msg }}',
                    title: '{{ ucfirst($msg) }}',
                    text: '{{ session($msg) }}',
                    timer: 3000,
                    showConfirmButton: false,
                    toast: true,
                    position: 'top-end',
                    timerProgressBar: true,
                });
            @endif
        @endforeach

        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan!',
                html: `<ul style="text-align:left; padding-left: 1.2rem;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>`,
                confirmButtonText: 'Oke',
            });
        @endif
    });
</script>
