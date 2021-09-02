<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product([
            'image' => '...',
            'title' => 'product1',
            'description' => 'description1',
            'price' => 12,
            'category_id' => 1
        ]);
        $product->save();

        $product = new Product([
            'image' => '...',
            'title' => 'product2',
            'description' => 'description2',
            'price' => 12,
            'category_id' => 2
        ]);
        $product->save();

        $product = new Product([
            'image' => '...',
            'title' => 'product3',
            'description' => 'description3',
            'price' => 12,
            'category_id' => 3
        ]);
        $product->save();
    }
}
