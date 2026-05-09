@props([
    'heightOffset' => '280',
    'minWidth' => '900px',
])

<div class="overflow-auto custom-scrollbar" style="height: calc(100vh - {{ $heightOffset }}px);">
    <table class="w-full" style="min-width: {{ $minWidth }};">
        <thead class="bg-brand-950 border-brand-500 border-y text-left sticky top-0 z-10">
            <tr>
                {{ $head }}
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
            {{ $body }}
        </tbody>
    </table>
</div>
