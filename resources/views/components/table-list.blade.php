@props([
    'data' => collect(),
    'id_key' => 'id',
    'value_key' => 'name',
    'empty_message' => '-',
])

<div class="sm:w-fit">
    <ul class="flex flex-col gap-1.5">
        @forelse ($data as $item)
            <li class="border-b border-gray-200 flex items-center last:border-b-0">
                <span>
                    @if ($id_key)
                        {{ $item[$id_key] ?? ($item->{$id_key} ?? '') }} -
                    @endif
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
