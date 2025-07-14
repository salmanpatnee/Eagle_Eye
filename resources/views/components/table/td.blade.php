@props([
    'action_col' => 'false',
])

<td class="px-3 py-3 whitespace-nowrap">
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
