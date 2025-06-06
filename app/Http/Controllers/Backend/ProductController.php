<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(20);
        return view('backend.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
  public function create()
{
    $categories = Category::all(); // Assuming you have a Category model

    return view('backend.products.create', compact('categories'));
}


    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
        {
            $validated = $request->validate([
                'name'        => 'required|string|max:255',
                'description' => 'nullable|string',
                'price'       => 'required|numeric',
                'category_id' => 'required|exists:categories,id',
                'images.*'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            ]);

            $product = Product::create([
                'name'        => $validated['name'],
                'slug'        => Str::slug($validated['name']),
                'description' => $validated['description'],
                'price'       => $validated['price'],
                'category_id' => $validated['category_id'],
                'images'      => [], // Will update later
            ]);

            $imagePaths = [];

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $filename = uniqid() . '.' . $image->getClientOriginalExtension();
                    $path = $image->storeAs("products", $filename, 'public');
                    $imagePaths[] = $path;
                }

                $product->update([
                    'images' => $imagePaths, // Assuming this is a JSON column
                ]);
            }

            return redirect()->route('products.index')->with('success', 'Product created successfully.');
        }


    /**
     * Display the specified resource.
     */
   public function show(Product $product) // Using Route Model Binding
    {
        return view('backend.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit(Product $product)
    {
        $categories = Category::all();
        return view('backend.products.edit', compact('product', 'categories'));
    }


    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, Product $product)
{
    $validated = $request->validate([
        'name'         => 'required|string|max:255',
        'description'  => 'nullable|string',
        'price'        => 'required|numeric',
        'category_id'  => 'required|exists:categories,id',
        'images.*'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'remove_images'=> 'nullable|array',
        'remove_images.*' => 'string',
    ]);

    // ✅ মূল ইনফো আপডেট করুন
    $product->update([
        'name'        => $validated['name'],
        'slug'        => Str::slug($validated['name']),
        'description' => $validated['description'],
        'price'       => $validated['price'],
        'category_id' => $validated['category_id'],
    ]);


    $currentImages = $product->images ?? [];


    $removeList = $request->remove_images ?? [];

    foreach ($removeList as $delPath) {
        if (in_array($delPath, $currentImages)) {
            if (Storage::disk('public')->exists($delPath)) {
                Storage::disk('public')->delete($delPath);
            }
            $currentImages = array_filter($currentImages, fn($img) => $img !== $delPath);
        }
    }

    // 📥 নতুন ইমেজ এড করুন
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $img) {
            $path = $img->store('products', 'public');
            $currentImages[] = $path;
        }
    }

    // 📌 আপডেট করা ইমেজ লিস্ট সেভ করুন
    $product->update([
        'images' => array_values($currentImages), // reindex the array
    ]);

    return redirect()->route('products.index')->with('success', 'Product updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
public function destroy(Product $product)
{
    // Delete associated images from storage
    if ($product->images) {
        foreach ($product->images as $img) {

            Storage::disk('public')->delete($img);
        }
    }

    $product->delete();

    return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
}

// product filter
 public function filterByCategory($categoryName)
    {
        // 'category' হলো Product মডেলে Category-এর সাথে রিলেশনের নাম
        $products = Product::whereHas('category', function ($query) use ($categoryName) {
                                // ক্যাটাগরির 'name' কলাম ধরে ফিল্টার
                                $query->where('name', $categoryName);
                            })
                            ->paginate(10); // প্রতি পেজে 10টি প্রোডাক্ট দেখাবে

        $title = $categoryName; // ভিউতে দেখানোর জন্য টাইটেল সেট করুন
        $context = 'category';  // ভিউতে কনটেক্সট বোঝানোর জন্য (ঐচ্ছিক)

        // 'products.filtered' নামে একটি নতুন ভিউ ফাইল তৈরি করুন অথবা বিদ্যমান ভিউ ব্যবহার করুন
        return view('backend.products.filtered', compact('products', 'title', 'context'));
    }

}
