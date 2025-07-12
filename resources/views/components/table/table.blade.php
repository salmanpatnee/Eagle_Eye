@props([
    'action_col' => 'false',
])

<div class="max-w-full overflow-x-auto lg:overflow-visible custom-scrollbar">
    <table class="w-full min-w-[970px]">
        {{ $slot }}
    </table>
</div>
