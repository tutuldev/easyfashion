<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; // Your simplified Order model
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /**
     * Show the checkout page.
     */
    public function create()
    {
        return view('checkout');
    }

    /**
     * Store a new order in storage.
     */
    public function store(Request $request)
    {
        // 1. Validate the request data with simplified rules
        $validatedData = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'customer_email' => 'nullable|email|max:255',
            'delivery_address' => 'required|string|max:500',
            'district' => 'required|string|max:255',
            'postcode' => 'nullable|string|max:255',
            'order_notes' => 'nullable|string',
            'payment_method' => 'required|string|in:cash_on_delivery,mobile_banking',
            'cart_items' => 'required|array',
            'cart_items.*.id' => 'required|integer',
            'cart_items.*.name' => 'required|string',
            'cart_items.*.price' => 'required|numeric|min:0',
            'cart_items.*.quantity' => 'required|integer|min:1',
            'cart_items.*.size' => 'nullable|string',
            'cart_items.*.color' => 'nullable|string',
        ]);

        $calculatedSubtotal = 0;
        foreach ($validatedData['cart_items'] as $item) {
            $calculatedSubtotal += $item['price'] * $item['quantity'];
        }

        $shippingCost = 0;
        if ($validatedData['district'] === 'Outside Dhaka') {
            $shippingCost = 80;
        }

        $totalAmount = $calculatedSubtotal + $shippingCost;

        try {
            $order = Order::create([
                'user_id' => Auth::id(),
                'customer_name' => $validatedData['customer_name'],
                'customer_phone' => $validatedData['customer_phone'],
                'customer_email' => $validatedData['customer_email'],
                'delivery_address' => $validatedData['delivery_address'],
                'district' => $validatedData['district'],
                'postcode' => $validatedData['postcode'],
                'order_notes' => $validatedData['order_notes'],
                'product_details' => $validatedData['cart_items'],
                'subtotal' => $calculatedSubtotal,
                'shipping_cost' => $shippingCost,
                'total' => $totalAmount,
                'payment_method' => $validatedData['payment_method'],
                'payment_status' => 'pending',
                'order_status' => 'pending',
            ]);

            return response()->json([
                'message' => 'Order placed successfully!',
                'order_id' => $order->id,
                'redirect_url' => route('order.confirmation', $order->id)
            ]);

        } catch (\Exception $e) {
            Log::error('Order placement failed: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to place order. Please try again.', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified order confirmation.
     * এই মেথডটি আপনার কন্ট্রোলারে যোগ করা প্রয়োজন।
     */
    public function show(Order $order)
    {
        // নিশ্চিত করুন আপনার কাছে frontend/order-confirmation.blade.php ফাইলটি আছে
        return view('order-confirmation', compact('order'));
    }
}
