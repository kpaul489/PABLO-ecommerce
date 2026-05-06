<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Classic Cotton T-Shirt',
                'description' => 'Comfortable everyday cotton t-shirt available in multiple colors.',
                'price' => 15000,
                'stock' => 100,
                'image' => 'cotton T-shirt.jpg',
            ],
            [
                'name' => 'Denim Jeans',
                'description' => 'Slim fit denim jeans with stretch fabric for comfort.',
                'price' => 35000,
                'stock' => 75,
                'image' => 'jeans.jpg',
            ],
            [
                'name' => 'Casual Sneakers',
                'description' => 'Lightweight sneakers perfect for daily wear and light exercise.',
                'price' => 45000,
                'stock' => 60,
                'image' => 'Sneakers.jpg',
            ],
            [
                'name' => 'Formal Dress Shirt',
                'description' => 'Professional dress shirt for office and formal occasions.',
                'price' => 25000,
                'stock' => 80,
                'image' => 'formalShirt.jpg',
            ],
            [
                'name' => 'Winter Jacket',
                'description' => 'Warm insulated jacket for cold weather with water-resistant outer shell.',
                'price' => 65000,
                'stock' => 40,
                'image' => 'Winter jacket.jpg',
            ],
            [
                'name' => 'Casual Hoodie',
                'description' => 'Soft fleece hoodie with kangaroo pocket and adjustable drawstring.',
                'price' => 30000,
                'stock' => 90,
                'image' => 'Hoodie.jpg',
            ],
            [
                'name' => 'Summer Dress',
                'description' => 'Light and breezy dress perfect for warm weather occasions.',
                'price' => 28000,
                'stock' => 55,
                'image' => 'dress.jpg',
            ],
            [
                'name' => 'Leather Backpack',
                'description' => 'Durable leather backpack with multiple compartments for daily use.',
                'price' => 50000,
                'stock' => 45,
                'image' => 'Backpack.jpg',
            ],
            [
                'name' => 'Running Shoes',
                'description' => 'High-performance running shoes with cushioned sole and breathable mesh.',
                'price' => 55000,
                'stock' => 70,
                'image' => 'CasualShoes .jpg',
            ],
            [
                'name' => 'Casual Shorts',
                'description' => 'Comfortable cotton shorts for casual outings and weekend wear.',
                'price' => 18000,
                'stock' => 85,
                'image' => 'Shorts.jpg',
            ],
            [
                'name' => 'Slim Fit Blazer',
                'description' => 'Modern slim fit blazer for professional and semi-formal events.',
                'price' => 55000,
                'stock' => 35,
                'image' => 'Blazer.jpg',
            ],
            [
                'name' => 'Graphic T-Shirt',
                'description' => 'Trendy graphic print t-shirt with soft cotton blend fabric.',
                'price' => 12000,
                'stock' => 120,
                'image' => 'tshirt.jpg',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
