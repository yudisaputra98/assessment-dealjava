<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SaleTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_success_get_data(): void
    {
        $sale = Sale::orderByDesc('created_at')->first();

        $response = $this->withHeaders([
                'Accept', 'application/json'
            ])->json('GET', '/api/sales/'.$sale->id.'?key=client-adfasdf123sdfbadsftwkljlkjl');

        $response->assertStatus(200);
    }

    public function test_invalid_kay(): void
    {
        $sale = Sale::orderByDesc('created_at')->first();

        $response = $this->withHeaders([
            'Accept', 'application/json'
        ])->json('GET', '/api/sales/'.$sale->id.'?key=');

        $response->assertStatus(400);
    }

    public function test_sales_id_not_valid(): void
    {
        $response = $this->withHeaders([
            'Accept', 'application/json'
        ])->json('GET', '/api/sales/123?key=client-adfasdf123sdfbadsftwkljlkjl');

        $response->assertStatus(404);
    }
}
