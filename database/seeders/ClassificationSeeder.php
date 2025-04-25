<?php

namespace Database\Seeders;

use App\Models\Classification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classifications = [
            [
                'classification_id' => 'TopSecret', 
                'classification_name' => 'Top Secret as per NCA-DCC Classification', 
                'classification_description' => 'The data classification as per NCA-DCC', 
                'classification_source' => 'NCA Saudi Arabia', 
            ], 
            [
                'classification_id' => 'Secret', 
                'classification_name' => 'Secret as per NCA-DCC Classification', 
                'classification_description' => 'The data classification as per NCA-DCC', 
                'classification_source' => 'NCA Saudi Arabia', 
            ], 
            [
                'classification_id' => 'Confidential', 
                'classification_name' => 'Confidential as per NCA-DCC Classification', 
                'classification_description' => 'The data classification as per NCA-DCC', 
                'classification_source' => 'NCA Saudi Arabia', 
            ], 
            [
                'classification_id' => 'Public', 
                'classification_name' => 'Public as per NCA-DCC Classification', 
                'classification_description' => 'The data classification as per NCA-DCC', 
                'classification_source' => 'NCA Saudi Arabia', 
            ], 
            
        ];

        foreach ($classifications as $classification) {
            Classification::create($classification);
        }
    }
}
