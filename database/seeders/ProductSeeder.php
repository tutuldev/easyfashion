<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Log;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('en_US');

        // ---
        // Clean up the 'products' image folder before seeding.
        // If your images are static in 'public/images', you don't need to delete this.
        // This part is more relevant if you were dynamically downloading and storing images.
        // For static images, you just need to ensure they exist in public/images.
        // ---

        $productsData = [
            ['Classic T-Shirt', 'Basic cotton t-shirt for everyday wear.', 499.99, 1],
            ['Graphic T-Shirt', 'Trendy printed t-shirt for casual looks.', 599.00, 1],
            ['Striped T-Shirt', 'Stylish striped design for a smart look.', 549.50, 1],
            ['Round Neck T-Shirt', 'Comfortable round neck design.', 429.99, 1],
            ['Plain T-Shirt', 'Minimal design for daily use.', 399.00, 1],

            ['Half Sleeve Cotton Shirt', 'Soft and breathable fabric.', 379.00, 2],
            ['Half Sleeve Slim Fit', 'Perfect fit for summer.', 420.00, 2],
            ['Half Sleeve Printed Shirt', 'Cool prints for casual vibes.', 499.00, 2],
            ['Casual Half Shirt', 'Relaxed fit for hot days.', 450.00, 2],
            ['Denim Half Sleeve Shirt', 'Durable and stylish.', 599.00, 2],

            ['Polo T-Shirt Classic', 'Signature polo with collar.', 699.99, 3],
            ['Polo T-Shirt Premium', 'High-quality fabric and fit.', 799.99, 3],
            ['Sports Polo Shirt', 'Moisture-wicking for sports.', 749.00, 3],
            ['Casual Polo', 'Best for daily wear.', 599.00, 3],
            ['Luxury Polo Shirt', 'Soft touch premium material.', 899.00, 3],

            ['Festive Panjabi', 'Perfect for weddings & events.', 1199.00, 4],
            ['Cotton Panjabi', 'Comfortable and traditional.', 999.00, 4],
            ['Designer Panjabi', 'Unique embroidery and texture.', 1599.00, 4],
            ['Formal Panjabi', 'Subtle and classy design.', 1299.00, 4],
            ['Casual Panjabi', 'Lightweight for daily wear.', 899.00, 4],
        ];

        $imageIndex = 1; // For cycling through pro-1.webp to pro-10.webp

        foreach ($productsData as [$name, $description, $price, $category_id]) {
            $currentPrice = $price;
            $compareAtPrice = null;
            // Optionally set a compare_at_price for some products (e.g., 50% chance)
            if ($faker->boolean(50)) {
                $compareAtPrice = round($currentPrice * $faker->randomFloat(2, 1.1, 1.5), 2); // 10% to 50% higher
            }

            // Generate an SKU
            $sku = 'PROD-' . strtoupper(Str::random(6)) . '-' . rand(100, 999);

            // Set quantity in stock
            $quantityInStock = $faker->numberBetween(10, 200);

            // Set active status
            $active = $faker->boolean(95); // 95% chance to be active

            // --- Image Handling ---
            $imagePaths = [];
            $numberOfImages = rand(1, 3); // Each product can have 1 to 3 images

            for ($i = 0; $i < $numberOfImages; $i++) {
                // Construct the image path based on your specified structure
                // 'images/' is the sub-directory inside 'public'
                $imagePaths[] = 'images/pro-' . $imageIndex . '.webp'; // ✅ এখানে পরিবর্তন করা হয়েছে

                // Increment index and reset if it goes beyond 10
                $imageIndex++;
                if ($imageIndex > 10) {
                    $imageIndex = 1;
                }
            }
            // --- End Image Handling ---

            Product::create([
                'name'              => $name,
                'slug'              => Str::slug($name),
                'description'       => $description,
                'price'             => $currentPrice,
                'compare_at_price'  => $compareAtPrice,
                'cost_price'        => round($currentPrice * $faker->randomFloat(2, 0.5, 0.8), 2), // Cost is 50-80% of current price
                'sku'               => $sku,
                'quantity_in_stock' => $quantityInStock,
                'active'            => $active,
                'category_id'       => $category_id,
                'images'            => $imagePaths, // Store the array of static image paths
            ]);
        }
    }
}
