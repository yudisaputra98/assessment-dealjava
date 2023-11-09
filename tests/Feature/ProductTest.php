<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_success_get_data(): void
    {
        $response = $this->withHeaders([
                'Accept', 'application/json'
            ])->json('GET', '/api/products?key=client-adfasdf123sdfbadsftwkljlkjl');

        $response->assertStatus(200);
    }

    public function test_invalid_kay(): void
    {
        $response = $this->withHeaders([
            'Accept', 'application/json'
        ])->json('GET', '/api/products?key=');

        $response->assertStatus(400);
    }
}
