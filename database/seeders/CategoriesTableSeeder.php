<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categories::create([
            'id' => 1,
            'name' => 'Healthy & Beauty',
            'description' => 'description category 1'
        ]);

        Categories::create([
            'id' => 2,
            'name' => 'Clothing & Shoes',
            'description' => 'description category 2'
        ]);

        Categories::create([
            'id' => 3,
            'name' => 'Sports & Outdoors',
            'description' => 'description category 3'
        ]);

        Categories::create([
            'id' => 4,
            'name' => 'Grocery & Whole Foods',
            'description' => 'description category 4'
        ]);

        Categories::create([
            'id' => 5,
            'name' => 'Computer & Accessories',
            'description' => 'description category 5'
        ]);
    }
}
