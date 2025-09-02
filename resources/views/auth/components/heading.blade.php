@php
    $level = in_array($level ?? 'h3', ['h1', 'h2', 'h3', 'h4', 'h5', 'h6']) ? $level : 'h6';

    $variant = ($variant === 'secondary') ? 'secondary' : 'primary';

    $color = $variant === 'primary' ? \App\Helpers\Colors::APP_PRIMARY_CLR : \App\Helpers\Colors::APP_SECONDARY_CLR;

    $htmlId = $id ?? null;

    $classes = $class ?? '';
@endphp

<{{ $level }} @if ($htmlId) id="{{ $htmlId }}" @endif class="{{ $classes }}" style="color: {{ $color }};">
    {{ $text ?? '' }}
</{{ $level }}>
