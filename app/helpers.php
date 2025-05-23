<?php
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

if (!function_exists('getParentStatus')) {
    function getParentStatus(Collection $report, string $controlIdPattern, bool $formatted = true, string $ignore = "")
    {
        // Define the hierarchy for status levels
        $statusLevels = [
            'Not Implemented' => 1,
            'Partially Implemented' => 2,
            'Implemented' => 3,
        ];
        
        // Convert comma separated string to array if needed

        $ignore = array_filter(array_map('trim', is_string($ignore) ? explode(',', $ignore) : []));
    
        
        // Filter report based on control_id pattern and ignore pattern
        $filteredReport = $report->filter(function ($item) use ($controlIdPattern, $ignore) {
            return Str::startsWith($item->control_id, $controlIdPattern) && 
                   !in_array($item->control_id, $ignore);
        });

        // return $filteredReport;

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
