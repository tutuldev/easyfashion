<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function index()
    {
        $categoryId = 3;

        $polo_products = Product::where('category_id', $categoryId)
            ->latest()
            ->paginate(12);

        $trending = Subcategory::whereIn('id', [6, 5])
        ->orderByRaw('FIELD(id, 6, 5)')
        ->get();



       // Half Shirt ⇒ id = 8,  Printed T‑Shirt ⇒ id = 4
        $commonSubategories = Subcategory::whereIn('id', [8, 4])
        ->orderByRaw('FIELD(id, 8, 4)')   // প্রথমে 8, তারপর 4
        ->get();
         $panjabi = Category::find(1);


        // Just-in latest 8 products
        $justin_products = Product::latest()->take(8)->get();

        return view('home', [
            'products' => $polo_products,
            'trending' => $trending,
            'commonSubategories' => $commonSubategories,
            'panjabi' => $panjabi,
            'justin_products' => $justin_products,
        ]);
    }

}
