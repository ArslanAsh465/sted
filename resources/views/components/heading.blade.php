@php
    use App\Helpers\Colors;

    $level = in_array($level ?? 'h3', ['h1', 'h2', 'h3', 'h4', 'h5', 'h6']) ? $level : 'h6';

    $class = $class ?? '';

    $variant = ($variant === 'secondary') ? 'secondary' : 'primary';
    $color = $variant === 'primary' ? Colors::APP_PRIMARY_CLR : Colors::APP_SECONDARY_CLR;

    $text = $text ?? 'Heading';
@endphp

<{{ $level }} class="{{ $class }}" style="color: {{ $color }};" {{ $attributes }} >
    {{ $text }}
</{{ $level }}>
