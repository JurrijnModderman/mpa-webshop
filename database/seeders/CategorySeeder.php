<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category([
            'name' => 'category1',
        ]);
        $category->save();

        $category = new Category([
            'name' => 'category2',
        ]);
        $category->save();

        $category = new Category([
            'name' => 'category3',
        ]);
        $category->save();
    }
}
