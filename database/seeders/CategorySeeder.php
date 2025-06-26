<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Casual Shirt',
                'image' => 'images/trending-1.webp'
            ],
            [
                'name' => 'Polo',
                'image' => 'images/trending-2.webp'
            ],
            [
                'name' => 'Half Shirt',
                'image' => 'images/cat-1.webp'
            ],
            [
                'name' => 'Printed T-Shart',
                'image' => 'images/cat-2.webp'
            ],
            [
                'name' => 'Panjabi',
                'image' => 'images/cat-3.webp'
            ],
        ];

        foreach ($categories as $categoryData) {
            Category::create([
                'name' => $categoryData['name'],
                'slug' => Str::slug($categoryData['name']),
                'image' => $categoryData['image']
            ]);
        }
    }
}
