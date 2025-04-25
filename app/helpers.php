<?php
use Illuminate\Support\Str;
use Illuminate\Support\Collection;

if (!function_exists('getParentStatus')) {
    function getParentStatus(Collection $report, string $controlIdPattern, bool $formatted = true): string
    {
        // Define the hierarchy for status levels
        $statusLevels = [
            'Not Implemented' => 1,
            'Partially Implemented' => 2,
            'Implemented' => 3,
        ];
        
        // Filter report based on control_id pattern
        $filteredReport = $report->filter(function ($item) use ($controlIdPattern) {
            return Str::startsWith($item->control_id, $controlIdPattern);
        });

        // Get all status values from the filtered records
        $statuses = $filteredReport->pluck('status');

        // Determine the lowest status level
        $minLevel = $statuses->map(fn($status) => $statusLevels[$status] ?? 3)->min();

        // Get the status string based on the minimum level
        $finalStatus = array_search($minLevel, $statusLevels);

        // Arabic translation
        $statusTranslations = [
            'Not Implemented' => 'غير مطبق',
            'Partially Implemented' => 'مطبق جزئيًا',
            'Implemented' => 'مطبق كليًا',
        ];
        $statusArValue = $statusTranslations[$finalStatus] ?? 'غير مطبق';

        if($formatted) {
            return "<p><span>{$statusArValue}</span><br><span>{$finalStatus}</span></p>";
        } else {
            return "{$statusArValue} - {$finalStatus}";
        }
    }
}
