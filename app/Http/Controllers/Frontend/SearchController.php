<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product; // আপনার প্রোডাক্ট মডেলের পাথটি নিশ্চিত করুন

class SearchController extends Controller
{
    /**
     * Handle the AJAX search request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request)
    {
        // সার্চ কোয়েরি ইনপুট থেকে নেওয়া হচ্ছে
        $query = $request->input('query');

        // যদি কোয়েরি খালি হয় অথবা 3 অক্ষরের কম হয়, তাহলে কোনো ফলাফল না দিয়ে খালি অ্যারে ফেরত পাঠানো হচ্ছে
        if (empty($query) || strlen($query) < 3) {
            return response()->json([]);
        }

        // প্রোডাক্ট মডেলে সার্চ লজিক
        // 'name' অথবা 'description' কলামে সার্চ করা হচ্ছে,
        // এবং 'category' রিলেশনশিপের 'name' কলামেও সার্চ করা হচ্ছে।
        // সর্বোচ্চ 10টি ফলাফল ফেরত পাঠানো হবে।
        $products = Product::where('name', 'LIKE', "%{$query}%")
                            ->orWhere('description', 'LIKE', "%{$query}%")
                            ->orWhereHas('category', function ($q) use ($query) {
                                $q->where('name', 'LIKE', "%{$query}%");
                            })
                            ->limit(10) // আপনার প্রয়োজন অনুযায়ী limit পরিবর্তন করতে পারেন
                            ->get()
                            ->map(function ($product) {
                                // প্রতিটি প্রোডাক্টের জন্য প্রয়োজনীয় ডেটা ফরম্যাট করা হচ্ছে
                                return [
                                    'id' => $product->id,
                                    'name' => $product->name,
                                    'price' => $product->price,
                                    'image_url' => $product->image ? asset('storage/' . $product->image) : '/images/placeholder.jpg',
                                    'slug' => $product->slug,
                                    'category_name' => $product->category->name ?? 'Uncategorized',
                                ];
                            });

        // JSON ফরম্যাটে ফলাফল ফেরত পাঠানো হচ্ছে
        return response()->json($products);
    }
}
