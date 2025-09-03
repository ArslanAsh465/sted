@php
    $type = $type ?? 'text';
    $name = $name ?? '';
    $label = $label ?? '';
    $id = $id ?? $name;
    $placeholder = $placeholder ?? '';
    $value = $value ?? '';
    $required = $required ?? false;
    $inputClass = $inputClass ?? 'form-control';
    $wrapperClass = $class ?? 'mb-3';
@endphp

<div class="{{ $wrapperClass }}">
    @if($label)
        <label for="{{ $id }}" class="form-label">{{ $label }}</label>
    @endif

    <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" value="{{ $value }}" placeholder="{{ $placeholder }}" @if($required) required @endif class="{{ $inputClass }}">

    @error($name)
        <div class="text-danger mt-1">{{ $message }}</div>
    @enderror
</div>
