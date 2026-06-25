<?php

namespace Tests\Feature;

use Tests\TestCase;

class BusinessPagesTest extends TestCase
{
    public function test_business_registration_page_is_accessible(): void
    {
        $response = $this->get(route('businesses.register'));

        $response->assertOk();
        $response->assertSee('Tradesperson Registration');
        $response->assertSee('List Your Business');
    }

    public function test_login_page_is_accessible(): void
    {
        $response = $this->get(route('login'));

        $response->assertOk();
        $response->assertSee('Login to your Trady account');
        $response->assertSee('List Your Business');
    }
}
