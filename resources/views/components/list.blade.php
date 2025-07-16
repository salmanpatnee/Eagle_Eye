@props([
    'data' => collect(),
    'id_key' => 'id',
    'value_key' => 'name',
    'empty_message' => 'No items found.',
])

<div class="rounded-lg border border-gray-200 bg-white sm:w-fit">
    <ul class="flex flex-col">
        @forelse ($data as $item)
            <li
                class="flex items-center gap-2 border-b border-gray-200 px-3 py-2.5 text-base text-left font-medium text-gray-600 last:border-b-0">
                <span>
                    {{ $item[$id_key] ?? ($item->{$id_key} ?? '') }} -
                    {{ $item[$value_key] ?? ($item->{$value_key} ?? '') }}
                </span>
            </li>
        @empty
            <li
                class="flex items-center gap-2 border-b border-gray-200 px-3 py-2.5 text-base text-left font-medium text-gray-600 last:border-b-0">
                {{ $empty_message }}
            </li>
        @endforelse
    </ul>
</div>
