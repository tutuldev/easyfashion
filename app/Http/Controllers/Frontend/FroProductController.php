<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class FroProductController extends Controller
{

    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            abort(404, 'Product not found.');
        }

        $relatedProducts = collect();

        if ($product->category) {
            $relatedProducts = Product::where('category_id', $product->category->id)
                                    ->where('id', '!=', $product->id)
                                    ->inRandomOrder()
                                    ->take(5)
                                    ->get();
        }

        return view('singel-product', compact('product', 'relatedProducts'));
    }
}
