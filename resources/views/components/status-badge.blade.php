@props(['status'])

@php
$baseClasses = 'inline-flex items-center rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset';
$statusClasses = '';
$statusText = ucfirst($status);

switch ($status) {
    case 'completed':
        $statusClasses = 'bg-green-50 text-green-700 ring-green-600/20';
        $statusText = 'Completed';
        break;
    case 'processing':
        $statusClasses = 'bg-blue-50 text-blue-700 ring-blue-600/20';
        $statusText = 'Processing';
        break;
    case 'failed':
        $statusClasses = 'bg-red-50 text-red-700 ring-red-600/20';
        $statusText = 'Failed';
        break;
    default:
        $statusClasses = 'bg-gray-50 text-gray-600 ring-gray-500/10';
        break;
}
@endphp

<span class="{{ $baseClasses }} {{ $statusClasses }}">
    {{ $statusText }}
</span>
