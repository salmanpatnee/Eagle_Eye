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
        // verify new Core Offerings section is present
        $response->assertSee('Core Offerings');
        // verify new gallery section defaults are present
        $response->assertSee('Explore Our Resources');
        $response->assertSee('Browse through our portfolio of visuals');
    }

    public function test_landing_page_css_contains_light_color_scheme(): void
    {
        $cssPath = public_path('css/landing.css');
        $cssContent = file_get_contents($cssPath);

        $this->assertStringContainsString('color-scheme: light only', $cssContent);
    }

    public function test_gallery_images_are_listed(): void
    {
        $response = $this->get('/');
        // ensure a few of the slide images appear which indicates the loop is working
        $response->assertSee('Slide1.JPG');
        $response->assertSee('Slide24.JPG');
    }
}
