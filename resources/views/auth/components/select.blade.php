@php
    $name = $name ?? '';
    $label = $label ?? '';
    $options = $options ?? [];
    $selected = $selected ?? null;
    $id = $id ?? $name;
    $class = $class ?? 'form-select';
    $required = $required ?? false;
@endphp

<div>
    <label for="{{ $id }}" class="form-label">{{ $label }}</label>

    <select name="{{ $name }}" id="{{ $id }}" class="form-select {{ $class }} @error($name) is-invalid @enderror" @if($required) required @endif >
        <option value="" disabled>Select {{ strtolower($label) }}</option>
        @foreach($options as $value => $optionLabel)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }}>
                {{ $optionLabel }}
            </option>
        @endforeach
    </select>

    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
