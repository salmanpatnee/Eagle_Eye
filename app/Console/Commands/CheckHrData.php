<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CheckHrData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-hr-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check HR expert master table for data integrity issues';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info('========== HR EXPERT MASTER TABLE DATA INTEGRITY CHECK ==========');
        $this->newLine();

        // 1. Check for duplicate expert_id
        $this->checkDuplicateExpertId();

        // 2. Check for duplicate names
        $this->checkDuplicateNames();

        // 3. Check for duplicate linkedin_profile
        $this->checkDuplicateLinkedIn();

        // 4. Check for orphaned nationality_id
        $this->checkOrphanedNationality();

        // 5. Check for orphaned organization_id
        $this->checkOrphanedOrganization();

        // 6. Check for orphaned industry_id
        $this->checkOrphanedIndustry();

        // 7. Check designation column
        $this->checkDesignationIssues();

        // 8. Summary statistics
        $this->showSummaryStatistics();

        $this->info('========== END OF REPORT ==========');

        return 0;
    }

    private function checkDuplicateExpertId(): void
    {
        $this->info('1. CHECKING FOR DUPLICATE EXPERT_ID');
        $duplicates = DB::table('hr_expert_master_table')
            ->select('expert_id', DB::raw('COUNT(*) as count'))
            ->groupBy('expert_id')
            ->having(DB::raw('COUNT(*)'), '>', 1)
            ->get();

        if ($duplicates->count() > 0) {
            $this->error('   ⚠️  DUPLICATES FOUND:');
            foreach ($duplicates as $row) {
                $this->line("      expert_id: {$row->expert_id} (appears {$row->count} times)");
            }
        } else {
            $this->line('   ✅ No duplicates found in expert_id');
        }
        $this->newLine();
    }

    private function checkDuplicateNames(): void
    {
        $this->info('2. CHECKING FOR DUPLICATE NAMES');
        $duplicates = DB::table('hr_expert_master_table')
            ->select('name', DB::raw('COUNT(*) as count'))
            ->groupBy('name')
            ->having(DB::raw('COUNT(*)'), '>', 1)
            ->get();

        if ($duplicates->count() > 0) {
            $this->error('   ⚠️  DUPLICATES FOUND:');
            foreach ($duplicates as $row) {
                $this->line("      name: '{$row->name}' (appears {$row->count} times)");
            }
        } else {
            $this->line('   ✅ No duplicates found in name column');
        }
        $this->newLine();
    }

    private function checkDuplicateLinkedIn(): void
    {
        $this->info('3. CHECKING FOR DUPLICATE LINKEDIN_PROFILE');
        $duplicates = DB::table('hr_expert_master_table')
            ->select('linkedin_profile', DB::raw('COUNT(*) as count'))
            ->whereNotNull('linkedin_profile')
            ->where('linkedin_profile', '!=', '')
            ->groupBy('linkedin_profile')
            ->having(DB::raw('COUNT(*)'), '>', 1)
            ->get();

        if ($duplicates->count() > 0) {
            $this->error('   ⚠️  DUPLICATES FOUND:');
            foreach ($duplicates as $row) {
                $this->line("      linkedin_profile: '{$row->linkedin_profile}' (appears {$row->count} times)");
            }
        } else {
            $this->line('   ✅ No duplicates found in linkedin_profile');
        }
        $this->newLine();
    }

    private function checkOrphanedNationality(): void
    {
        $this->info('4. CHECKING NATIONALITY_ID REFERENCES');
        $orphaned = DB::table('hr_expert_master_table')
            ->whereNotNull('nationality_id')
            ->where('nationality_id', '!=', '')
            ->leftJoin('nationalities', 'hr_expert_master_table.nationality_id', '=', 'nationalities.id')
            ->whereNull('nationalities.id')
            ->select('hr_expert_master_table.expert_id', 'hr_expert_master_table.name', 'hr_expert_master_table.nationality_id')
            ->get();

        if ($orphaned->count() > 0) {
            $this->error('   ⚠️  ORPHANED REFERENCES FOUND:');
            foreach ($orphaned as $row) {
                $this->line("      expert_id: {$row->expert_id}, name: '{$row->name}', nationality_id: {$row->nationality_id} (NOT found in nationalities table)");
            }
        } else {
            $this->line('   ✅ All nationality_id references are valid');
        }
        $this->newLine();
    }

    private function checkOrphanedOrganization(): void
    {
        $this->info('5. CHECKING ORGANIZATION_ID REFERENCES');
        $orphaned = DB::table('hr_expert_master_table')
            ->whereNotNull('hr_expert_master_table.organization_id')
            ->where('hr_expert_master_table.organization_id', '!=', '')
            ->leftJoin('hr_organization_table', 'hr_expert_master_table.organization_id', '=', 'hr_organization_table.organization_id')
            ->whereNull('hr_organization_table.organization_id')
            ->select('hr_expert_master_table.expert_id', 'hr_expert_master_table.name', 'hr_expert_master_table.organization_id')
            ->get();

        if ($orphaned->count() > 0) {
            $this->error('   ⚠️  ORPHANED REFERENCES FOUND:');
            foreach ($orphaned as $row) {
                $this->line("      expert_id: {$row->expert_id}, name: '{$row->name}', organization_id: {$row->organization_id} (NOT found in hr_organization_table)");
            }
        } else {
            $this->line('   ✅ All organization_id references are valid');
        }
        $this->newLine();
    }

    private function checkOrphanedIndustry(): void
    {
        $this->info('6. CHECKING INDUSTRY_ID REFERENCES');
        $orphaned = DB::table('hr_expert_master_table')
            ->whereNotNull('hr_expert_master_table.industry_id')
            ->where('hr_expert_master_table.industry_id', '!=', '')
            ->leftJoin('hr_industry_table', 'hr_expert_master_table.industry_id', '=', 'hr_industry_table.industry_id')
            ->whereNull('hr_industry_table.industry_id')
            ->select('hr_expert_master_table.expert_id', 'hr_expert_master_table.name', 'hr_expert_master_table.industry_id')
            ->get();

        if ($orphaned->count() > 0) {
            $this->error('   ⚠️  ORPHANED REFERENCES FOUND:');
            foreach ($orphaned as $row) {
                $this->line("      expert_id: {$row->expert_id}, name: '{$row->name}', industry_id: {$row->industry_id} (NOT found in hr_industry_table)");
            }
        } else {
            $this->line('   ✅ All industry_id references are valid');
        }
        $this->newLine();
    }

    private function checkDesignationIssues(): void
    {
        $this->info('7. CHECKING DESIGNATION COLUMN FOR FORMATTING ISSUES');
        $records = DB::table('hr_expert_master_table')
            ->select('expert_id', 'name', 'designation')
            ->whereNotNull('designation')
            ->where('designation', '!=', '')
            ->get();

        $issues = [];
        foreach ($records as $row) {
            $trimmed = trim($row->designation);
            // Check for leading/trailing spaces
            if ($row->designation !== $trimmed) {
                $issues[] = [
                    'expert_id' => $row->expert_id,
                    'name' => $row->name,
                    'designation' => $row->designation,
                    'issue' => 'Leading/trailing spaces',
                ];
            }
            // Check for multiple consecutive spaces
            if (preg_match('/\s{2,}/', $row->designation)) {
                $issues[] = [
                    'expert_id' => $row->expert_id,
                    'name' => $row->name,
                    'designation' => $row->designation,
                    'issue' => 'Multiple consecutive spaces',
                ];
            }
        }

        if (count($issues) > 0) {
            $this->error('   ⚠️  POTENTIAL ISSUES FOUND:');
            foreach ($issues as $issue) {
                $this->line("      expert_id: {$issue['expert_id']}, name: '{$issue['name']}'");
                $this->line("         designation: '{$issue['designation']}' ({$issue['issue']})");
            }
        } else {
            $this->line('   ✅ No spacing/formatting issues found');
        }
        $this->newLine();

        // Show all unique designations for manual review
        $this->info('8. UNIQUE DESIGNATIONS (for manual spelling review):');
        $designations = DB::table('hr_expert_master_table')
            ->select('designation')
            ->whereNotNull('designation')
            ->where('designation', '!=', '')
            ->distinct()
            ->orderBy('designation')
            ->pluck('designation');

        if ($designations->count() > 0) {
            foreach ($designations as $designation) {
                $this->line("   - $designation");
            }
        } else {
            $this->line('   No designations found');
        }
        $this->newLine();
    }

    private function showSummaryStatistics(): void
    {
        $this->info('9. SUMMARY STATISTICS');
        $totalRecords = DB::table('hr_expert_master_table')->count();
        $nullNationality = DB::table('hr_expert_master_table')
            ->whereNull('nationality_id')
            ->orWhere('nationality_id', '')
            ->count();
        $nullOrganization = DB::table('hr_expert_master_table')
            ->whereNull('organization_id')
            ->orWhere('organization_id', '')
            ->count();
        $nullIndustry = DB::table('hr_expert_master_table')
            ->whereNull('industry_id')
            ->orWhere('industry_id', '')
            ->count();

        $this->line("   Total records: $totalRecords");
        $this->line("   Records with NULL/empty nationality_id: $nullNationality");
        $this->line("   Records with NULL/empty organization_id: $nullOrganization");
        $this->line("   Records with NULL/empty industry_id: $nullIndustry");
        $this->newLine();
    }
}
