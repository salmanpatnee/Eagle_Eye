@props([
    'action_col' => 'false',
    'class' => '',
    'wrap' => 'false',
    'minWidth' => null,
    'maxWidth' => null,
])

@php
    $wrapClass = match(true) {
        (bool) ($minWidth || $maxWidth) => 'whitespace-normal',
        $wrap === 'true'                => 'whitespace-normal max-w-[260px]',
        default                         => 'whitespace-nowrap',
    };
    $style = 'vertical-align: top;';
    $style .= $minWidth ? " min-width: {$minWidth};" : '';
    $style .= $maxWidth ? " max-width: {$maxWidth}; word-break: break-word;" : '';
@endphp

<td {{ $attributes->merge(['class' => 'px-3 py-3 ' . $wrapClass . ' ' . $class]) }} style="{{ $style }}">
    @if ($action_col === 'true')
        <div class="flex">
            {{ $slot }}
        </div>
    @else
        <span class="block font-medium text-gray-700 text-theme-sm">
            {{ $slot }}
        </span>
    @endif
</td>
