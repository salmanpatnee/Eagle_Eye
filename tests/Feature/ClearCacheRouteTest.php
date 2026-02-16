<?php

namespace Tests\Feature;

use Tests\TestCase;

class ClearCacheRouteTest extends TestCase
{
    public function test_clear_route_returns_successful_response(): void
    {
        $response = $this->get('/clear');

        $response->assertStatus(200);
        $response->assertJson(['message' => 'All caches cleared successfully.']);
    }
}
