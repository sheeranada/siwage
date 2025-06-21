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

    <select class="form-control @error($name) is-invalid @enderror" id="{{ $name }}" name="{{ $name }}"
        {{ $required ? 'required' : '' }} {{ $attributes }}>
        {{ $slot }}
    </select>

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
