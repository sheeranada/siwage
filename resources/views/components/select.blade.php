<div class="form-floating">
    <select class="form-select" id="{{ $name }}" aria-label="Floating label select example"
        name="{{ $name }}">
        <option selected disabled value>Pilih..</option>
        {{ $slot }}
    </select>
    <label for="{{ $name }}">{{ $label }}</label>
</div>
