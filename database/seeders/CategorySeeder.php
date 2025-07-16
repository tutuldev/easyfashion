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
            'name' => 'Panjabi',
            'image' => 'images/cat-3.webp'
            ],
              [
                'name' => 'T-Sharts',
                'image' => 'images/cat-3.webp'
            ],
            [
                'name' => 'Shirts',
                'image' => 'images/cat-3.webp'
            ],
            [
                'name' => 'Junior',
                'image' => 'images/cat-3.webp'
            ],

            [
                'name' => 'Accessories',
                'image' => 'images/cat-3.webp'
            ],
            [
                'name' => 'Pants',
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
