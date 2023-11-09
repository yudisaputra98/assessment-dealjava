<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Sale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product_ids = [1,2];
        foreach ($product_ids as $product_id) {
            $product = Product::findOrFail($product_id);
            $variants = ProductVariant::where('product_id', $product_id)->get();

            $variantSales = [];
            $total = $product->price;
            foreach ($variants as $variant) {
                $variantSales[] = ['variants_name' => $variant->name, 'price' => $variant->additional_price];
                $total += $variant->additional_price;
            }

            $sale = Sale::create([
                'total_price' => $total,
                'payment_method' => 'OVO',
            ]);

            $sale->products()->attach($product, [
                'price' => $product->price,
                'variants' => json_encode($variantSales)
            ]);
        }
    }
}
