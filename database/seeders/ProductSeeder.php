<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage; // Don't forget to import Storage
use Faker\Factory as Faker; // Don't forget to import Faker
use Illuminate\Support\Facades\Log; // ✅ THIS IS THE LINE THAT WAS LIKELY MISSING OR MISPLACED

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('en_US'); // You can specify a locale

        // ---
        // Clean up the 'products' image folder before seeding
        // This ensures that old demo images are removed before new ones are created.
        if (Storage::disk('public')->exists('products')) {
            Storage::disk('public')->deleteDirectory('products');
        }
        // Recreate the directory after deleting it
        Storage::disk('public')->makeDirectory('products');
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

        foreach ($productsData as [$name, $description, $price, $category_id]) {
            $imagePaths = [];
            // Generate 1 to 3 random images for each product
            $numberOfImages = rand(1, 3);

            for ($i = 0; $i < $numberOfImages; $i++) {
                $filename = uniqid() . '.jpg'; // Unique filename
                $path = 'products/' . $filename; // Path within the 'public' disk

                try {
                    // Fetch a random image from Lorem Picsum or a similar service
                    // using Faker's imageUrl method. Ensure you have internet connectivity.
                    $imageUrl = $faker->imageUrl(400, 300, 'clothing', true, $name);
                    $imageContent = @file_get_contents($imageUrl); // Added @ to suppress warnings directly if URL fails

                    if ($imageContent !== false) {
                        Storage::disk('public')->put($path, $imageContent); // Store the image
                        $imagePaths[] = $path; // Add to the list of paths for this product
                    } else {
                        // This line was likely causing the error if Log facade was not imported
                        Log::warning("[ProductSeeder] Failed to download image from: " . $imageUrl);
                    }
                } catch (\Exception $e) {
                    // This line was also likely causing the error if Log facade was not imported
                    Log::error("[ProductSeeder] Error saving image for product '{$name}': " . $e->getMessage());
                    // If an image fails to download, you might want to skip it or add a default
                }
            }

            Product::create([
                'name'        => $name,
                'slug'        => Str::slug($name),
                'description' => $description,
                'price'       => $price,
                'category_id' => $category_id,
                'images'      => $imagePaths, // Store the generated image paths
            ]);
        }
    }
}
