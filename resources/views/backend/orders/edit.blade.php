@extends('backend.app')
@section('title', 'Edit Order')
@section('content')

<div class="max-w-3xl mx-auto px-4 py-10 bg-white shadow rounded">
    <h2 class="text-xl font-bold mb-6">Edit Order #{{ $order->id }}</h2>

    {{-- ✅ Success Message --}}
    @if (session('success'))
        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- ✅ Validation Errors --}}
    @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <strong>Whoops! Something went wrong.</strong>
            <ul class="mt-2 list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="checkoutForm" action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="customer_name" class="block text-gray-700 text-sm font-semibold mb-2">YOUR FULL NAME<span class="text-red-500">*</span></label>
            <input type="text" id="customer_name" name="customer_name" value="{{ old('customer_name', $order->customer_name) }}" class="shadow appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm" required />
        </div>

        <div class="mb-4">
            <label for="customer_phone" class="block text-gray-700 text-sm font-semibold mb-2">MOBILE NUMBER<span class="text-red-500">*</span></label>
            <input type="tel" id="customer_phone" name="customer_phone" value="{{ old('customer_phone', $order->customer_phone) }}" class="shadow appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm" required />
        </div>

        <div class="mb-4">
            <label for="customer_email" class="block text-gray-700 text-sm font-semibold mb-2">EMAIL (OPTIONAL)</label>
            <input type="email" id="customer_email" name="customer_email" value="{{ old('customer_email', $order->customer_email) }}" class="shadow appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm" />
        </div>

        <div class="mb-4">
            <label for="delivery_address" class="block text-gray-700 text-sm font-semibold mb-2">YOUR FULL ADDRESS<span class="text-red-500">*</span></label>
            <textarea id="delivery_address" name="delivery_address" rows="3" class="shadow appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm" required>{{ old('delivery_address', $order->delivery_address) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="district" class="block text-gray-700 text-sm font-semibold mb-2">DISTRICT<span class="text-red-500">*</span></label>
            <select id="district" name="district" class="shadow appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm" required>
                <option value="Dhaka" {{ $order->district === 'Dhaka' ? 'selected' : '' }}>Dhaka</option>
                <option value="Outside Dhaka" {{ $order->district === 'Outside Dhaka' ? 'selected' : '' }}>Outside Dhaka</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="postcode" class="block text-gray-700 text-sm font-semibold mb-2">POSTCODE (OPTIONAL)</label>
            <input type="text" id="postcode" name="postcode" value="{{ old('postcode', $order->postcode) }}" class="shadow appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm" />
        </div>

        <div class="mb-4">
            <label for="order_notes" class="block text-gray-700 text-sm font-semibold mb-2">ORDER NOTES (OPTIONAL)</label>
            <textarea id="order_notes" name="order_notes" rows="3" class="shadow appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm">{{ old('order_notes', $order->order_notes) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="payment_method" class="block text-gray-700 text-sm font-semibold mb-2">PAYMENT METHOD<span class="text-red-500">*</span></label>
            <select id="payment_method" name="payment_method" class="shadow appearance-none border rounded-md w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline text-sm" required>
                <option value="cash_on_delivery" {{ $order->payment_method === 'cash_on_delivery' ? 'selected' : '' }}>Cash on Delivery</option>
                <option value="mobile_banking" {{ $order->payment_method === 'mobile_banking' ? 'selected' : '' }}>Mobile Banking</option>
            </select>
        </div>

        <!-- PAYMENT STATUS -->
        <div class="mb-4">
            <label for="payment_status" class="block text-gray-700 text-sm font-semibold mb-2">PAYMENT STATUS</label>
            <select id="payment_status" name="payment_status" class="shadow appearance-none border rounded-md w-full py-2 px-3 text-gray-700 text-sm focus:outline-none focus:shadow-outline">
                <option value="pending" {{ $order->payment_status === 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="paid" {{ $order->payment_status === 'paid' ? 'selected' : '' }}>Paid</option>
            </select>
        </div>

        <!-- ORDER STATUS -->
        <div class="mb-6">
            <label for="order_status" class="block text-gray-700 text-sm font-semibold mb-2">ORDER STATUS</label>
            <select id="order_status" name="order_status" class="shadow appearance-none border rounded-md w-full py-2 px-3 text-gray-700 text-sm focus:outline-none focus:shadow-outline">
                <option value="pending" {{ $order->order_status === 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="shipped" {{ $order->order_status === 'shipped' ? 'selected' : '' }}>Shipped</option>
                <option value="delivered" {{ $order->order_status === 'delivered' ? 'selected' : '' }}>Delivered</option>
            </select>
        </div>

        {{-- Optional: Show product details (non-editable) --}}
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-semibold mb-2">CART ITEMS</label>
            <ul class="list-disc pl-5 text-sm text-gray-600">
                @foreach ($order->product_details as $item)
                    <li>{{ $item['name'] }} ({{ $item['quantity'] }} x {{ $item['price'] }}৳) — Size: {{ $item['size'] ?? 'N/A' }}, Color: {{ $item['color'] ?? 'N/A' }}</li>
                @endforeach
            </ul>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">Update Order</button>
    </form>
</div>

@endsection
