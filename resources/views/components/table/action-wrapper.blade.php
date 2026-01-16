@props([
    'title' => '',
])

<div class="flex flex-col items-center sm:flex-row sm:items-center sm:justify-between px-2 mb-2 gap-2">
    <div class="w-full sm:w-auto flex justify-center sm:justify-start">
        @if ($title)
            <h1 class="font-medium text-lg text-center sm:text-left"> {{ $title }}</h1>
        @endif
    </div>

    <div class="w-full sm:w-auto flex justify-center sm:justify-end gap-2">
        {{ $slot }}
    </div>

    {{-- Named slot for additional content --}}
    @isset($extra)
        {{ $extra }}
    @endisset
    {{--
            How to use the named slot in Blade:

            <x-table.action-wrapper title="My Table">
                <x-slot:extra>
                    <!-- Your extra content here -->
                    <button class="btn">Extra Action</button>
                </x-slot:extra>

                <!-- Default slot content here -->
                <x-action.button label="Add" />
            </x-table.action-wrapper>
        --}}
</div>
