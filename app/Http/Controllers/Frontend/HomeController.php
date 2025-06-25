<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
public function index()
{
    $categoryId = 3;

    $polo_products = Product::where('category_id', $categoryId)
                ->latest()
                ->paginate(12);

    return view('home', ['products' => $polo_products]);

}


}
