<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('en_US');

        // ধরে নিচ্ছি CategorySeeder আগেই চালানো হয়েছে
        $categories = Category::with('subcategories')->get();

        if ($categories->isEmpty()) {
            $this->command->warn('⚠️  কোনও ক্যাটেগরি পাওয়া যায়নি—আগে CategorySeeder চালান।');
            return;
        }

        $imageIndex = 1;         // images/pro-1.webp … pro-10.webp
        $imageMax   = 10;

        /* ---------- ৫০‑বার লুপ, সব রকম ভ্যারিয়েশন ---------- */
        foreach (range(1, 50) as $loop) {

            // র‍্যান্ডম ক্যাটেগরি ও (থাকলে) তার সাব‑ক্যাটেগরি
            $category    = $categories->random();
            $subcategory = $category->subcategories->random() ?? null;

            /* ------------ নাম, দাম, বর্ণনা ------------ */
            $name = $faker->randomElement([
                'Classic', 'Premium', 'Budget', 'Luxury', 'Sport', 'Eco', 'Smart'
            ]) . ' ' . $faker->randomElement([
                'T‑Shirt', 'Shirt', 'Polo', 'Panjabi', 'Hoodie', 'Jacket', 'Trouser'
            ]);

            $price           = $faker->randomFloat(2, 299, 1999);                 // ৳২৯৯‑৳১৯৯৯
            $compareAtPrice  = $faker->boolean(60) ? round($price * $faker->randomFloat(2, 1.1, 1.6), 2) : null;
            $costPrice       = round($price * $faker->randomFloat(2, 0.5, 0.8), 2);

            /* --------------- ছবি অ্যারে --------------- */
            $numImages  = rand(1, 3);
            $imagePaths = [];

            for ($i = 0; $i < $numImages; $i++) {
                $imagePaths[] = 'images/pro-' . $imageIndex . '.webp';
                $imageIndex   = ($imageIndex >= $imageMax) ? 1 : $imageIndex + 1;
            }

            /* --------------- প্রোডাক্ট তৈরি --------------- */
            Product::create([
                'name'              => $name,
                'slug'              => Str::slug($name . '-' . $loop),   // ইউনিক রেখে
                'description'       => $faker->sentence(15),
                'price'             => $price,
                'compare_at_price'  => $compareAtPrice,
                'cost_price'        => $costPrice,
                'sku'               => 'PROD-' . strtoupper(Str::random(6)) . '-' . rand(100, 999),
                'quantity_in_stock' => $faker->numberBetween(0, 250),
                'active'            => $faker->boolean(90),
                'category_id'       => $category->id,
                'subcategory_id'    => optional($subcategory)->id,
                'images'            => $imagePaths,                       // Product মডেলে 'images' => 'array' কাস্ট
            ]);
        }
    }
}
