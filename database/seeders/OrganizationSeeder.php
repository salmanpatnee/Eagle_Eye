<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Organization::create([
            'organization_id' => 'ORG-001', 
            'organization_name_english' => 'ACME Corporation', 
            'organization_name_arabic' => 'شركة أكمي', 
            'organization_address' => 'Digital City, SBM Building (KB05) Prince Turki bin Abdulaziz Al-Awwal Road - Al-Nakhil P.O. Box-818, Riyadh 11421', 
        ]);
    }
}
