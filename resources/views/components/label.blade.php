@php
    $text = $text ?? '';

    $for = $for ?? null;

    $class = $class ?? '';
@endphp

<label 
    @if($for) for="{{ $for }}" @endif 
    class="{{ $class }}" 
    {{ $attributes }}
>
    {{ $text }}
</label>
