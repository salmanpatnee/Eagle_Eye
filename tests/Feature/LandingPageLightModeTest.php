<?php

namespace Tests\Feature;

use Tests\TestCase;

class LandingPageLightModeTest extends TestCase
{
    public function test_landing_page_contains_light_color_scheme_meta_tag(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('<meta name="color-scheme" content="light only">', false);
    }

    public function test_landing_page_css_contains_light_color_scheme(): void
    {
        $cssPath = public_path('css/landing.css');
        $cssContent = file_get_contents($cssPath);

        $this->assertStringContainsString('color-scheme: light only', $cssContent);
    }
}
