<?php

namespace Database\Factories;

use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Organization>
 */
class OrganizationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'organization_id' => fake()->unique()->bothify('ORG-####'),
            'organization_name_english' => fake()->company(),
            'organization_name_arabic' => fake()->company(),
            'organization_address' => fake()->address(),
            'initiative_owner_name' => fake()->name(),
            'initiative_owner_title' => fake()->jobTitle(),
            'initiative_owner_contact_number' => fake()->phoneNumber(),
            'initiative_owner_email' => fake()->safeEmail(),
        ];
    }
}
