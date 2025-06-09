@extends('frontend.app')

@section('title', 'Order Confirmation')

@section('content')
    <div class="bg-white"> {{-- Matches outer bg-white from checkout page --}}
        <div class="h-24"></div> {{-- Spacer for fixed header --}}

        <div class="max-w-screen-xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
            {{-- Main Page Title, styled like checkout page title --}}
            <h1 class="text-3xl text-center font-bold text-gray-600 px-3 py-3 mb-8">Order Confirmation</h1>

            <div class="bg-white p-8 rounded-lg shadow-md"> {{-- Main content block, styled like checkout's main form/order area --}}
                <h2 class="text-2xl font-bold text-green-600 text-center mb-6">Order Placed Successfully!</h2>
                <p class="text-lg text-gray-700 text-center mb-8">Thank you for your order. Your order details are below.</p>

                {{-- Order Summary Section --}}
                <div class="w-full bg-gray-50 p-6 rounded-lg shadow-inner mb-8"> {{-- Styled like checkout's order summary box --}}
                    <h3 class="text-xl font-bold text-gray-800 mb-4 pb-2 border-b">Order Summary</h3>

                    <div class="text-left mb-6">
                        <p class="text-gray-700 text-base mb-2"><strong>Order ID:</strong> {{ $order->id }}</p>
                        <p class="text-gray-700 text-base mb-2"><strong>Customer Name:</strong> {{ $order->customer_name }}</p>
                        <p class="text-gray-700 text-base mb-2"><strong>Phone:</strong> {{ $order->customer_phone }}</p>
                        <p class="text-gray-700 text-base mb-2"><strong>Delivery Address:</strong> {{ $order->delivery_address }}, {{ $order->district }}</p>
                        @if($order->postcode)
                            <p class="text-gray-700 text-base mb-2"><strong>Postcode:</strong> {{ $order->postcode }}</p>
                        @endif
                        <p class="text-gray-700 text-base mb-2"><strong>Payment Method:</strong> {{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</p>
                        <p class="text-gray-700 text-base mb-2"><strong>Total Amount:</strong> ৳{{ number_format($order->total, 2) }}</p>
                    </div>
                </div>

                {{-- Items Ordered Section --}}
                <div class="w-full bg-gray-50 p-6 rounded-lg shadow-inner"> {{-- Another block for items, consistent styling --}}
                    <h3 class="text-xl font-bold text-gray-800 mb-4 pb-2 border-b">Items Ordered</h3>
                    <div class="text-left">
                        @foreach($order->product_details as $item)
                            <div class="flex justify-between items-center py-2 border-b border-gray-200 last:border-b-0">
                                <p class="text-gray-700 text-sm">
                                    {{ $item['name'] }} ({{ $item['size'] ?? 'N/A' }}) x {{ $item['quantity'] }}
                                </p>
                                <p class="text-gray-800 font-semibold text-sm">৳{{ number_format($item['price'] * $item['quantity'], 2) }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mt-8 text-center"> {{-- Button centered --}}
                    <a href="/" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-md transition duration-200">Continue Shopping</a>
                </div>
            </div>
        </div>
        <div class="py-40"></div> {{-- Adds spacing at the bottom --}}
    </div>
@endsection
