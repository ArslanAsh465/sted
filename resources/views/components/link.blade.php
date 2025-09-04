@php
    use App\Helpers\Colors;

    $href = $href ?? '#';

    $variant = ($variant === 'secondary') ? 'secondary' : 'primary';
    $textColor = $variant === 'primary' ? Colors::APP_PRIMARY_CLR : Colors::APP_SECONDARY_CLR;  
    $hoverTextColor = $variant === 'primary' ? Colors::APP_PRIMARY_CLR_DARK : Colors::APP_SECONDARY_CLR_DARK;

    $class = $class ?? '';

    $id = $id ?? null;

    $text = $text ?? '';
@endphp

<a
    href="{{ $href }}"
    class="{{$class}}"
    @if ($id) id="{{ $id }}" @endif
    style="color: {{ $textColor }};"
    onmouseover="this.style.color='{{ $hoverTextColor }}'"
    onmouseout="this.style.color='{{ $textColor }}'"
    {{ $attributes }}
>
    {{ $text }}
</a>
