@props([
    'action_col' => 'false',
])

<div class="max-w-full overflow-x-auto custom-scrollbar">
    <table class="w-full border-collapse">
        {{ $slot }}
    </table>
</div>
