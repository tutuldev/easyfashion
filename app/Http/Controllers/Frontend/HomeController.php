<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index()
    {
        $categoryId = 3;

        $polo_products = Product::where('category_id', $categoryId)
            ->latest()
            ->paginate(12);

        $trendingCategories = Category::whereIn('id', [1, 2])->get();
        $commonCategories = Category::whereIn('id', [3, 4, 5])->get();

        // Just-in latest 8 products
        $justin_products = Product::latest()->take(8)->get();

        return view('home', [
            'products' => $polo_products,
            'trendingCategories' => $trendingCategories,
            'commonCategories' => $commonCategories,
            'justin_products' => $justin_products, 
        ]);
    }
}
