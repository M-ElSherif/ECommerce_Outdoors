<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'cat_id' => 1,
            'name' => 'test product 1',
            'description' => 'description 1',
            'image' => 'images/product1.jpg', 
            'price' => '10.00',
            'quantity' => '10',
        ]);

        Product::create([
            'cat_id' => 2,
            'name' => 'sneakers',
            'description' => 'Breathable and lightweight material, Easy on/off',
            'image' => 'images/product2.jpg',
            'price' => '36.00',
            'quantity' => '10',
        ]);

        Product::create([
            'cat_id' => 5,
            'name' => 'laptop',
            'description' => '15-inch Laptop, 10th Generation Intel Core i3-1005G1 Processor, 8GB RAM, 128 GB SATA 3 M.2 SSD, Windows 10 Home',
            'image' => 'images/product5.png',
            'price' => '1200.00',
            'quantity' => '10',
        ]);

        Product::create([
            'cat_id' => 2,
            'name' => 'test product 4',
            'description' => 'description 4',
            'image' => 'images/product4.jpg',
            'price' => '40.00',
            'quantity' => '10',
        ]);

        Product::create([
            'cat_id' => 3,
            'name' => 'test product 5',
            'description' => 'description 5',
            'image' => 'images/product3.jpg',
            'price' => '50.00',
            'quantity' => '10',
        ]);

        Product::create([
            'cat_id' => 4,
            'name' => 'diabetic nutrition',
            'description' => 'Fiber helps to optimize glycemic response and additionally helps to assist in managing the blood sugar levels',
            'image' => 'images/product6.png',
            'price' => '49.50',
            'quantity' => '10',
        ]);

        Product::create([
            'cat_id' => 5,
            'name' => 'laptop sleeve',
            'description' => 'hickest Lightest Water Resistant Neoprene Protective Laptop Case',
            'image' => 'images/product7.jpg',
            'price' => '15.99',
            'quantity' => '10',
        ]);


    }
}
