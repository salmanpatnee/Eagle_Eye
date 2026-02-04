<?php

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

if (! function_exists('getLayoutByRole')) {
    /**
     * Returns the appropriate layout based on the user's role ID
     *
     * @param  int|null  $roleId  The role ID to check (defaults to the authenticated user's role ID)
     * @param  string  $superAdminLayout  Layout for super admin (role ID 1)
     * @param  string  $defaultLayout  Layout for other roles
     * @return string The layout name to extend
     *
     * Usage in Blade templates:
     *
     *   @extends(getLayoutByRole()) // Uses currently authenticated user's role with default layouts
     *   @extends(getLayoutByRole(1)) // Uses specific role ID with default layouts
     *   @extends(getLayoutByRole(null, 'layouts.admin', 'layouts.user')) // Custom layouts
     */
    function getLayoutByRole(?int $roleId = null, string $superAdminLayout = 'layouts.control', string $defaultLayout = 'layouts.app-full'): string
    {
        // If no role ID is provided, get it from the authenticated user
        if ($roleId === null) {
            $user = auth()->user();
            $roleId = $user ? $user->role_id : null;
        }

        // Return the appropriate layout based on role ID
        return $roleId === 1 ? $superAdminLayout : $defaultLayout;
    }
}

if (! function_exists('hasRole')) {
    /**
     * Check if the authenticated user has a specific role
     *
     * @param  int  $roleId  The role ID to check
     * @return bool True if the user has the specified role, false otherwise
     *
     * Usage in Blade templates:
     *
     *   @if(hasRole(1)) // Check if user has role ID 1
     *
     *   @endif
     */
    function hasRole(int $roleId): bool
    {
        $user = auth()->user();

        return $user && $user->role_id === $roleId;
    }
}

if (! function_exists('getUserRoleId')) {
    /**
     * Get the role ID of the authenticated user
     *
     * @return int|null The role ID of the authenticated user, or null if not authenticated
     *
     * Usage in Blade templates:
     *
     *   @if(getUserRoleId() === 1) // Check if current user has role ID 1
     *
     *   @endif
     */
    function getUserRoleId(): ?int
    {
        $user = auth()->user();

        return $user ? $user->role_id : null;
    }
}

if (! function_exists('getParentStatus')) {
    function getParentStatus(Collection $report, string $controlIdPattern, bool $formatted = true, string $ignore = '')
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
                   ! in_array($item->control_id, $ignore);
        });

        // return $filteredReport;

        // Get all status values from the filtered records
        $statuses = $filteredReport->pluck('status');

        // Determine the lowest status level
        $minLevel = $statuses->map(fn ($status) => $statusLevels[$status] ?? 3)->min();

        // Get the status string based on the minimum level
        $finalStatus = array_search($minLevel, $statusLevels);

        // Arabic translation
        $statusTranslations = [
            'Not Implemented' => 'غير مطبق',
            'Partially Implemented' => 'مطبق جزئيًا',
            'Implemented' => 'مطبق كليًا',
        ];
        $statusArValue = $statusTranslations[$finalStatus] ?? 'غير مطبق';

        if ($formatted) {
            return "<p><span>{$statusArValue}</span><br><span>{$finalStatus}</span></p>";
        } else {
            return "{$statusArValue} - {$finalStatus}";
        }
    }
}
