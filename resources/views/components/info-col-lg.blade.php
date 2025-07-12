@props([
    'label' => '',
    'label_ar' => '',
])


<div class="mb-6">
    <div class="border rounded-lg p-3 bg-white">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-1.5">
            <span class="font-bold sm:order-1 sm:text-right sm:w-auto text-left w-full">
                {{ $label }}
            </span>
            <span class="font-bold sm:ml-2 sm:order-2 sm:text-left sm:w-auto text-left text-sm w-full" dir="rtl"
                lang="ar" aria-label="{{ $label_ar }}">
                {{ $label_ar }}
            </span>
        </div>
        <div class="px-0 py-2.5 text-base font-medium text-gray-600   text-left">
            {{ $slot }}
        </div>
    </div>
</div>
