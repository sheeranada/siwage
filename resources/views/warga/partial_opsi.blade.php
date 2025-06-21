<div class="d-flex justify-content-center gap-2">
    <div class="edit">
        @include('warga.edit_warga', ['item' => $item])
    </div>
    <div class="delete ml-2">
        <form action="{{ route('warga.delete', $item->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger show_confirm">
                <i class="fas fa-trash"></i>
            </button>
        </form>
    </div>
</div>
