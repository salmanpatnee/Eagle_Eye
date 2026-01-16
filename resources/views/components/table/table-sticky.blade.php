@props([
    'action_col' => 'false',
])

<div class="mt-2 border border-gray-200" style="max-height: 450px; overflow: auto;">
    <div>
        <table class="w-full" style="border-collapse: collapse; vertical-align: top;">

            {{ $slot }}
        </table>
    </div>
</div>
