@props([
    'text' => 'Submit',
    'text_rtl' => 'إرسال',
])
<button
    class="flex items-center justify-center w-full px-4 py-3 text-sm font-medium text-white transition rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600 flex-col">
    <span class="ml-2" dir="rtl" lang="ar">{{ $text_rtl }}</span>
    {{ $text }}
</button>
