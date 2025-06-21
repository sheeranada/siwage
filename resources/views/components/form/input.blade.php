@php
    $required = $required ?? false;
@endphp

<div class="form-group mb-3">
    <label for="{{ $name }}">
        {{ $label }}
        @if ($required)
            <span class="text-danger">*</span>
        @endif
    </label>

    <input type="{{ $type ?? 'text' }}" class="form-control @error($name) is-invalid @enderror" id="{{ $name }}"
        name="{{ $name }}" value="{{ old($name, $value) }}" placeholder="{{ $label }}"
        {{ $required ? 'required' : '' }} {{ $attributes }}>

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
