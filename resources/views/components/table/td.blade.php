@props([
    'action_col' => 'false',
    'class' => '',
    'wrap' => 'false',
])

<td {{ $attributes->merge(['class' => 'px-3 py-3 ' . ($wrap === 'false' ? 'whitespace-nowrap' : 'whitespace-normal max-w-[260px]') . ' ' . $class]) }} style="vertical-align: top;">
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
