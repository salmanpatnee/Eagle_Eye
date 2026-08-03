<?php

namespace Tests\Feature;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class OrganizationControllerTest extends TestCase
{
    use DatabaseTransactions;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    public function test_index_displays_all_organizations()
    {
        Organization::query()->delete();

        $organizations = Organization::factory()->count(3)->create();

        $this->actingAs($this->user);

        $response = $this->get(route('organizations.index'));

        $response->assertStatus(200);
        $response->assertViewIs('process.initial-setup.organizations.index');
        $response->assertViewHas('organizations', function ($viewOrganizations) use ($organizations) {
            return $viewOrganizations->count() === 3
                && $viewOrganizations->pluck('id')->sort()->values()->all()
                    === $organizations->pluck('id')->sort()->values()->all();
        });
    }

    public function test_index_returns_empty_collection_when_no_organizations_exist()
    {
        Organization::query()->delete();

        $this->actingAs($this->user);

        $response = $this->get(route('organizations.index'));

        $response->assertStatus(200);
        $response->assertViewHas('organizations', function ($viewOrganizations) {
            return $viewOrganizations->isEmpty();
        });
    }

    public function test_index_only_selects_expected_columns()
    {
        Organization::factory()->create([
            'organization_address' => 'Some Address',
        ]);

        $this->actingAs($this->user);

        $response = $this->get(route('organizations.index'));

        $response->assertViewHas('organizations', function ($viewOrganizations) {
            $organization = $viewOrganizations->first();

            return array_key_exists('organization_address', $organization->getAttributes()) === false;
        });
    }

    public function test_index_is_accessible_without_admin_middleware()
    {
        $this->actingAs($this->user);

        $response = $this->get(route('organizations.index'));

        $response->assertStatus(200);
    }

    public function test_guest_cannot_access_index()
    {
        $response = $this->get(route('organizations.index'));

        $response->assertRedirect(route('login'));
    }
}
