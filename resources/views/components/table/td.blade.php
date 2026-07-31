@props([
    'action_col' => 'false',
    'class' => '',
    'wrap' => 'false',
    'minWidth' => null,
    'maxWidth' => null,
    'freeze' => false,
    'freezeLast' => false,
])

@php
    $wrapClass = match(true) {
        (bool) ($minWidth || $maxWidth) => 'whitespace-normal',
        $wrap === 'true'                => 'whitespace-normal max-w-[260px]',
        default                         => 'whitespace-nowrap',
    };
    $isFrozen = $freeze === true || $freeze === 'true';
    $isFrozenLast = $freezeLast === true || $freezeLast === 'true';
    $freezeClass = $isFrozen ? 'stf-freeze' . ($isFrozenLast ? ' stf-freeze--last' : '') : '';
    $style = 'vertical-align: top;';
    $style .= $minWidth ? " min-width: {$minWidth};" : '';
    $style .= $maxWidth ? " max-width: {$maxWidth}; word-break: break-word;" : '';
    $textClass = $attributes->has('style') ? 'text-inherit' : 'text-gray-700 dark:text-gray-100';
@endphp

<td {{ $attributes->merge(['class' => 'px-3 py-3 ' . $wrapClass . ' ' . $freezeClass . ' ' . $class]) }} style="{{ $style }}">
    @if ($action_col === 'true')
        <div class="flex">
            {{ $slot }}
        </div>
    @else
        <span class="block font-medium {{ $textClass }} text-theme-sm">
            {{ $slot }}
        </span>
    @endif
</td>
