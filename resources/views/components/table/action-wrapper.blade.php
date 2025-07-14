@props([
    'title' => '',
])

<div class="flex flex-col items-center sm:flex-row sm:items-center sm:justify-between px-3 mb-4 gap-2">
    <div class="w-full sm:w-auto flex justify-center sm:justify-start">
        @if ($title)
            <h1 class="font-medium text-lg text-center sm:text-left"> {{ $title }}</h1>
        @endif
    </div>
    <div class="w-full sm:w-auto flex justify-center sm:justify-end gap-2">
        {{ $slot }}
    </div>
</div>
