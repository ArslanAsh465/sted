@php
    $name = $name ?? '';
    $id = $id ?? $name;
    $class = $class ?? 'form-select';
    $options = $options ?? [];
    $selected = old($name, $selected ?? '');
    $required = $required ? 'required' : '';
@endphp

<div>
    <select name="{{ $name }}" id="{{ $id }}" class="{{ $class }} @error($name) is-invalid @enderror" {{ $required ?? 'required' }}>
        <option value="" disabled>Select {{ ucfirst($name) }}</option>

        @foreach($options as $value => $optionLabel)
            <option value="{{ $value }}" {{ $selected == (string)$value ? 'selected' : '' }}>
                {{ $optionLabel }}
            </option>
        @endforeach
    </select>

    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
