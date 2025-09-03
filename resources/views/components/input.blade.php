@php
    $type = $type ?? 'text';
    $name = $name ?? '';
    $id = $id ?? $name;
    $value = $value ?? old($name);
    $class = $class ?? '';
@endphp

<input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" value="{{ $value }}" class="form-control {{ $class }}" {{ $attributes }} >
