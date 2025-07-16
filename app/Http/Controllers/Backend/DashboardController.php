<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\HasMiddleware;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;

class DashboardController extends Controller implements HasMiddleware
{
    // একই রুট‑মিডলওয়্যার এখানে ঘোষণা
    public static function middleware(): array
    {
        return ['auth', 'verified'];
    }

public function index()
{
    // গত ৩০ দিনের অর্ডার সংখ্যা
    $last30DaysOrders = Order::where('created_at', '>=', Carbon::now()->subDays(30))
                             ->count();

    // অ্যাকটিভ ও ইন-অ্যাকটিভ প্রোডাক্ট সংখ্যা (boolean ভিত্তিক)
    $activeProducts   = Product::where('active', true)->count();
    $inactiveProducts = Product::where('active', false)->count();

    return view('dashboard', compact('last30DaysOrders','activeProducts','inactiveProducts'));
}
}
