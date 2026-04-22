@props([
    'data' => collect(),
    'id_key' => 'id',
    'value_key' => 'name',
    'empty_message' => 'No items found.',
    'route_name' => '',
    'route_param_key' => 'id',
])

<div class="rounded-lg border border-gray-200 bg-white sm:w-fit">
    <ul class="flex flex-col">
        @forelse ($data as $item)
            <li
                class="flex items-center gap-2 border-b border-gray-200 px-3 py-2.5 text-base text-left font-medium text-gray-600 last:border-b-0">
                @if ($route_name)
                    <a href="{{ route($route_name, $item[$route_param_key] ?? ($item->{$route_param_key} ?? null)) }}" class="text-brand-600 hover:underline">
                @endif
                <span>
                    @if (!empty($id_key))
                        {{ $item[$id_key] ?? ($item->{$id_key} ?? '') }} -
                    @endif
                    {{ $item[$value_key] ?? ($item->{$value_key} ?? '') }}
                </span>
                @if ($route_name)
                    </a>
                @endif
            </li>
        @empty
            <li
                class="flex items-center gap-2 border-b border-gray-200 px-3 py-2.5 text-base text-left font-medium text-gray-600 last:border-b-0">
                {{ $empty_message }}
            </li>
        @endforelse
    </ul>
</div>
