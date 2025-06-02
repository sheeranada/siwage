<div class="form-floating mb-3">
    <input type="{{ $type }}" class="form-control @error('{{ $name }}') is-invalid @enderror"
        id="{{ $name }}" placeholder="..." name="{{ $name }}" value="{{ $value }}">
    <label for="{{ $name }}">{{ $label }} <span class="badge badge-light text-danger">*</span></label>

    @error('{{ $name }}')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
