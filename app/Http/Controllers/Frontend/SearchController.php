<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        if (empty($query) || strlen($query) < 3) {
            return response()->json([]);
        }

        $products = Product::where('name', 'LIKE', "%{$query}%")
                            ->orWhere('description', 'LIKE', "%{$query}%")
                            ->orWhereHas('category', function ($q) use ($query) {
                                $q->where('name', 'LIKE', "%{$query}%");
                            })
                            ->limit(10)
                            ->get()
                            ->map(function ($product) {
                                $firstImage = null;

                                // ✅ এখানে আপডেট করা হয়েছে: সরাসরি $product->images-কে অ্যারে হিসেবে চেক করুন
                                // কারণ Product মডেলে 'images' কলামকে 'array' হিসেবে কাস্ট করা হয়েছে।
                                // এটি নিশ্চিত করবে যে $product->images সবসময় হয় একটি অ্যারে, অথবা null হবে।
                                if (is_array($product->images) && !empty($product->images)) {
                                    $firstImage = $product->images[0]; // অ্যারের প্রথম ইমেজ পাথটি নিন
                                }
                                // আমরা 'is_string' চেকটি সরিয়ে দিচ্ছি, কারণ কাস্টের কারণে এটি অপ্রয়োজনীয়।
                                // যদি কাস্ট না থাকত, তাহলে এই চেকটি দরকার হতো।

                                $imageUrl = asset('images/default.webp'); // Default fallback URL

                                if ($firstImage) { // যদি একটি প্রথম ইমেজ পাথ পাওয়া যায়
                                    // যদি পাথ 'products/' দিয়ে শুরু হয়, তবে এটি storage/app/public থেকে
                                    if (Str::startsWith($firstImage, 'products/')) {
                                        $imageUrl = asset('storage/' . $firstImage);
                                    }
                                    // অন্যথায়, এটি সম্ভবত public ফোল্ডারের রুট থেকে (যেমন seeder-এর ইমেজ)
                                    else {
                                        $imageUrl = asset($firstImage);
                                    }
                                }

                                return [
                                    'id' => $product->id,
                                    'name' => $product->name,
                                    'price' => $product->price,
                                    'image_url' => $imageUrl, // ফাইনাল URL
                                    'slug' => $product->slug,
                                    'category_name' => $product->category->name ?? 'Uncategorized',
                                ];
                            });

        return response()->json($products);
    }
}
