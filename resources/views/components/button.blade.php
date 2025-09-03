@php
    use App\Helpers\Colors;

    $type = $type ?? 'button';

    $text = $text ?? 'Button';

    $variant = ($variant === 'secondary') ? 'secondary' : 'primary';

    $bgColor = $variant === 'primary' ? Colors::APP_PRIMARY_CLR : Colors::APP_SECONDARY_CLR;
    $hoverColor = $variant === 'primary' ? Colors::APP_PRIMARY_CLR_DARK : Colors::APP_SECONDARY_CLR_DARK;

    $style = "background-color: {$bgColor}; color: white;";

    $class = $class ?? '';

    $id = $id ?? null;
@endphp

<button
    type="{{ $type }}"
    @if ($id) id="{{ $id }}" @endif
    class="btn {{$class}}"
    style="{{ $style }}"
    onmouseover="this.style.backgroundColor='{{ $hoverColor }}'"
    onmouseout="this.style.backgroundColor='{{ $bgColor }}'"
    {{ $attributes }}
>
    {{ $text }}
</button>
