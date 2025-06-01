@props(['id', 'name', 'label' => '', 'value' => '', 'options' => []])

<div class="form-floating mb-3">
    <input type="text" class="form-control @error($name) is-invalid @enderror" id="{{ $id }}"
        name="{{ $name }}" list="list-{{ $id }}" placeholder="..." value="{{ old($name, $value) }}">
    <label for="{{ $id }}">{{ $label }}</label>

    <datalist id="list-{{ $id }}">
        @foreach ($options as $option)
            <option value="{{ $option }}">
        @endforeach
    </datalist>

    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
