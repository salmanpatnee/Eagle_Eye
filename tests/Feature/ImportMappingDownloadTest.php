<?php

namespace Tests\Feature;

use App\Models\ImportMapping;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ImportMappingDownloadTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Create a test user with superadmin role for testing
        $this->user = \App\Models\User::factory()->create();
    }

    public function test_user_can_download_template()
    {
        $mapping = ImportMapping::create([
            'name' => 'Risk to Control',
            'description' => 'Test mapping',
            'left_entity_label' => 'Risk ID',
            'right_entity_label' => 'Control ID',
            'left_entity_table' => 'risk_master_table',
            'left_entity_column' => 'risk_id',
            'right_entity_table' => 'control_master_table',
            'right_entity_column' => 'id',
            'pivot_table_name' => 'risk_vs_control_table',
            'is_active' => true,
        ]);

        $this->actingAs($this->user);

        $response = $this->get(route('imports.mappings.downloadTemplate', $mapping->id));

        $response->assertStatus(200);
        $response->assertHeader('Content-Type',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $response->assertHeader('Content-Disposition');
    }

    public function test_download_filename_follows_pattern()
    {
        $mapping = ImportMapping::create([
            'name' => 'Risk to Control',
            'left_entity_label' => 'Risk ID',
            'right_entity_label' => 'Control ID',
            'left_entity_table' => 'risk_master_table',
            'left_entity_column' => 'risk_id',
            'right_entity_table' => 'control_master_table',
            'right_entity_column' => 'id',
            'pivot_table_name' => 'risk_vs_control_table',
        ]);

        $this->actingAs($this->user);

        $response = $this->get(route('imports.mappings.downloadTemplate', $mapping->id));

        $response->assertStatus(200);
        $this->assertStringContainsString('risk-to-control_template.xlsx',
            $response->headers->get('Content-Disposition'));
    }

    public function test_special_characters_in_filename_are_sanitized()
    {
        $mapping = ImportMapping::create([
            'name' => 'Risk/Control (Draft v2)',
            'left_entity_label' => 'Risk ID',
            'right_entity_label' => 'Control ID',
            'left_entity_table' => 'risk_master_table',
            'left_entity_column' => 'risk_id',
            'right_entity_table' => 'control_master_table',
            'right_entity_column' => 'id',
            'pivot_table_name' => 'risk_vs_control_table',
        ]);

        $this->actingAs($this->user);

        $response = $this->get(route('imports.mappings.downloadTemplate', $mapping->id));

        $response->assertStatus(200);
        $this->assertStringContainsString('risk-control-draft-v2_template.xlsx',
            $response->headers->get('Content-Disposition'));
    }

    public function test_nonexistent_mapping_returns_404()
    {
        $this->actingAs($this->user);

        $response = $this->get(route('imports.mappings.downloadTemplate', 99999));

        $response->assertStatus(404);
    }

    public function test_multiple_downloads_produce_identical_files()
    {
        $mapping = ImportMapping::create([
            'name' => 'Risk to Control',
            'left_entity_label' => 'Risk ID',
            'right_entity_label' => 'Control ID',
            'left_entity_table' => 'risk_master_table',
            'left_entity_column' => 'risk_id',
            'right_entity_table' => 'control_master_table',
            'right_entity_column' => 'id',
            'pivot_table_name' => 'risk_vs_control_table',
        ]);

        $this->actingAs($this->user);

        $response1 = $this->get(route('imports.mappings.downloadTemplate', $mapping->id));
        $response2 = $this->get(route('imports.mappings.downloadTemplate', $mapping->id));

        $this->assertEquals($response1->getContent(), $response2->getContent());
    }

    public function test_international_characters_are_preserved_in_labels()
    {
        $mapping = ImportMapping::create([
            'name' => 'Risk Control',
            'left_entity_label' => 'رمز  المخاطر',
            'right_entity_label' => 'معرف التحكم',
            'left_entity_table' => 'risk_master_table',
            'left_entity_column' => 'risk_id',
            'right_entity_table' => 'control_master_table',
            'right_entity_column' => 'id',
            'pivot_table_name' => 'risk_vs_control_table',
        ]);

        $this->actingAs($this->user);

        $response = $this->get(route('imports.mappings.downloadTemplate', $mapping->id));

        $response->assertStatus(200);
    }
}
