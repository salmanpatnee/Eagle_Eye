<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = [
            [
                'location_id' => 'LOC-RYD', 
                'location_name' => 'Riyadh Office', 
                'location_description' => 'Riyadh Head Office', 
                'location_city' => 'Riyadh', 
                'location_country' => 'Saudi Arabia', 
            ], 
            [
                'location_id' => 'LOC-JED', 
                'location_name' => 'Jeddah Office', 
                'location_description' => 'Branch Office', 
                'location_city' => 'Jeddah', 
                'location_country' => 'Saudi Arabia', 
            ], 
            [
                'location_id' => 'LOC-KHO', 
                'location_name' => 'Khobar Office', 
                'location_description' => 'Branch Office', 
                'location_city' => 'Khobar', 
                'location_country' => 'Saudi Arabia', 
            ],
            [
                'location_id' => 'LOC-JUB', 
                'location_name' => 'Jubail Office', 
                'location_description' => 'Branch Office', 
                'location_city' => 'Jubail', 
                'location_country' => 'Saudi Arabia', 
            ]
        ];

        foreach ($locations as $location) {
            Location::create($location);
        }
    }
}
