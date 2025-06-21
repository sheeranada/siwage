<!-- Button trigger modal -->
<button type="button" class="btn btn-{{ $btn }} btn-sm" data-toggle="modal" data-target="#{{ $id }}">
    <i class="fas {{ $icon }}"></i>
    {{ $btnLabel }}
</button>

<!-- Modal -->
<div class="modal fade" id="{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="{{ $id }}Label"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ $action }}" method="POST">
                @csrf
                @if ($method !== 'POST')
                    @method($method)
                @endif

                <div class="modal-header">
                    <h5 class="modal-title" id="{{ $id }}Label">
                        {{ $btnLabel ?: 'Edit Data' }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    {{ $slot }}
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times-circle"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-{{ $btn }}">
                        {{ $btnSubmit ?? 'Simpan' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
