<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubcategorySeeder extends Seeder
{
    public function run(): void
    {
        /*  ক্যাটেগরি‑to‑সাবক্যাটেগরি ম্যাপ + ইমেজ  */
        $data = [
            'Panjabi' => [
                ['Easy Design Panjabi',  'images/1.webp'],
                ['Easy Karchupi Panjabi','images/2.webp'],
                ['Kabli Panjabi Set',    'images/3.webp'],
            ],

            'T-Sharts' => [
                ['Printed T-Shirt', 'images/cat-2.webp'],
                ['Polo T-Shirt',    'images/trending-2.webp'],
            ],

            'Shirts' => [
                ['Casual Shirt', 'images/trending-1.webp'],
                ['Formal Shirt', 'images/2.webp'],
                ['Half Shirt',   'images/cat-1.webp'],
            ],

            'Junior' => [
                ['Boys Full Shirt',  'images/1.webp'],
                ['Boys Half Shirt',  'images/2.webp'],
                ['Boys Polo T-Shirt','images/3.webp'],
                ['Boys T-Shirt',     'images/4.webp'],
                ['Boys Panjabi',     'images/5.webp'],
                ['Girls T-Shirt',    'images/6.webp'],
                ['Girls Frock',      'images/7.webp'],
            ],

            'Accessories' => [
                ['Belt',            'images/1.webp'],
                ['Easy Tie',        'images/2.webp'],
                ["Man's Underwear", 'images/3.webp'],
            ],

            'Pants' => [
                ['Gabardine Pants', 'images/1.webp'],
                ['Jeans',           'images/2.webp'],
                ['Formal Pants',    'images/3.webp'],
                ['Pajama',          'images/4.webp'],
                ['Shorts',          'images/5.webp'],
                ['Trousers',        'images/6.webp'],
            ],
        ];

        foreach ($data as $categoryName => $subs) {
            $category = Category::where('name', $categoryName)->first();
            if (!$category) {
                continue; // ক্যাটেগরি না পেলে স্কিপ
            }

            foreach ($subs as [$subName, $imagePath]) {
                Subcategory::firstOrCreate(
                    [
                        'name'        => $subName,
                        'category_id' => $category->id,
                    ],
                    [
                        'slug'  => Str::slug($subName . '-' . $category->id),
                        'image' => $imagePath,
                    ]
                );
            }
        }
    }
}
