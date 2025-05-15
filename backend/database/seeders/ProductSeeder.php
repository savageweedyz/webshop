<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Hogwarts Legacy',
            'type' => 'game',
            'price' => 59.99,
            'image' => '/assets/hogwart.jpg'
        ]);
        Product::create([
            'name' => 'Hogwarts Legacy',
            'type' => 'game',
            'price' => 59.99,
            'image' => '/assets/hogwart.jpg'
        ]);
        Product::create([
            'name' => 'STEAM Gift Card $50',
            'type' => 'gift card',
            'price' => 50.00,
            'image' => '/assets/hogwart.jpg'
        ]);
        Product::create([
            'name' => 'PlayStation Store $25',
            'type' => 'gift card',
            'price' => 25.00,
            'image' => '/assets/hogwart.jpg'
        ]);
    }
}