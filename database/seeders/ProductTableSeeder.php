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
            'image' => 'https://images-na.ssl-images-amazon.com/images/I/31b4K-hFH-L._SX395_BO1,204,203,200_.jpg',
            'title' => 'product1',
            'description' => 'description1',
            'price' => 12,
            'category_id' => 1
        ]);
        $product->save();

        $product = new Product([
            'image' => 'https://images-na.ssl-images-amazon.com/images/I/31b4K-hFH-L._SX395_BO1,204,203,200_.jpg',
            'title' => 'product2',
            'description' => 'description2',
            'price' => 12,
            'category_id' => 2
        ]);
        $product->save();

        $product = new Product([
            'image' => 'https://images-na.ssl-images-amazon.com/images/I/31b4K-hFH-L._SX395_BO1,204,203,200_.jpg',
            'title' => 'product3',
            'description' => 'description3',
            'price' => 12,
            'category_id' => 2
        ]);
        $product->save();

        $product = new Product([
            'image' => 'https://images-na.ssl-images-amazon.com/images/I/31b4K-hFH-L._SX395_BO1,204,203,200_.jpg',
            'title' => 'product4',
            'description' => 'description4',
            'price' => 15,
            'category_id' => 3
        ]);
        $product->save();

        $product = new Product([
            'image' => 'https://images-na.ssl-images-amazon.com/images/I/31b4K-hFH-L._SX395_BO1,204,203,200_.jpg',
            'title' => 'product5',
            'description' => 'description5',
            'price' => 15,
            'category_id' => 3
        ]);
        $product->save();
    }
}
