{{-- resources/views/orders/index.blade.php --}}
@extends('backend.app')
@section('title', 'All Orders')

@section('content')
    <!-- Header -->
    <div class="flex items-center justify-between flex-wrap gap-4">
        <h2 class="text-2xl font-semibold flex items-center">
            Orders
            <span
                class="inline-flex items-center justify-center w-6 h-6 ml-2 text-xs font-bold text-white bg-green-600 rounded-full">
                {{ $orders->total() }}
            </span>
        </h2>
    </div>

    <!-- Table -->
    <div class="mt-6 overflow-x-auto">
        <table class="min-w-full table-auto border border-gray-200 text-center text-sm">
            <thead class="bg-gray-100 text-gray-600 font-medium">
                <tr>
                    <th class="px-4 py-2 border">Serial</th>
                    <th class="px-4 py-2 border">Order&nbsp;ID</th>
                    <th class="px-4 py-2 border">Customer</th>
                    <th class="px-4 py-2 border">Phone</th>
                    <th class="px-4 py-2 border min-w-[12rem]">Products</th>
                    <th class="px-4 py-2 border">Total&nbsp;(৳)</th>
                    <th class="px-4 py-2 border">Payment</th>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $k => $order)
                    @php
                        // কাচা স্ট্যাটাস সরাসরি নেওয়া হচ্ছে
                        $payment   = $order->payment_status ?: 'N/A';
                        $status    = $order->order_status   ?: 'N/A';

                        // ব্যাজ‑ক্লাস মেপিং
                        $payBadge = [
                            'paid'     => 'bg-green-100 text-green-700',
                            'pending'  => 'bg-yellow-100 text-yellow-700',
                            'failed'   => 'bg-red-100 text-red-700',
                            'refunded' => 'bg-gray-100 text-gray-700',
                            'N/A'      => 'bg-gray-100 text-gray-700',
                        ][$payment] ?? 'bg-gray-100 text-gray-700';

                        $statBadge = [
                            'processing' => 'bg-blue-100 text-blue-700',
                            'shipped'    => 'bg-cyan-100 text-cyan-700',
                            'delivered'  => 'bg-green-100 text-green-700',
                            'cancelled'  => 'bg-red-100 text-red-700',
                            'pending'    => 'bg-yellow-100 text-yellow-700',
                            'N/A'        => 'bg-gray-100 text-gray-700',
                        ][$status] ?? 'bg-gray-100 text-gray-700';
                    @endphp

                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border">{{ $orders->firstItem() + $k }}</td>
                        <td class="px-4 py-2 border">#{{ $order->id }}</td>
                        <td class="px-4 py-2 border">{{ $order->customer_name }}</td>
                        <td class="px-4 py-2 border">{{ $order->customer_phone }}</td>

                        {{-- Products --}}
                        <td class="px-4 py-2 border">
                            <div class="max-h-28 overflow-y-auto text-left space-y-1">
                                @foreach ($order->product_details as $p)
                                    <div class="flex items-center justify-between">
                                        <span class="truncate">{{ $p['name'] }}</span>
                                        <span class="text-xs ml-2">({{ $p['size'] }})</span>
                                        <span class="text-xs font-semibold ml-2">×{{ $p['quantity'] }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </td>

                        <td class="px-4 py-2 border font-semibold">
                            ৳{{ number_format($order->total, 2) }}
                        </td>

                        {{-- Payment badge --}}
                        <td class="px-4 py-2 border">
                            <span class="inline-block px-2 py-0.5 rounded-full text-xs font-medium {{ $payBadge }}">
                                {{ ucfirst($payment) }}
                            </span>
                        </td>

                        {{-- Order‑status badge --}}
                        <td class="px-4 py-2 border">
                            <span class="inline-block px-2 py-0.5 rounded-full text-xs font-medium {{ $statBadge }}">
                                {{ ucfirst($status) }}
                            </span>
                        </td>

                        {{-- Actions --}}
                        <td class="px-4 py-2 border">
                            <div class="flex flex-wrap justify-center gap-2">
                                {{-- ✏️ Edit --}}
                                <a href="{{ route('orders.edit', $order->id) }}"
                                    class="px-2 py-1 rounded text-xs text-white bg-sky-600 hover:bg-sky-700 transition">
                                    Edit
                                </a>

                                {{-- 🔄 Update (status/payment) --}}
                                <a href="{{ route('orders.edit', $order->id) }}"
                                    class="px-2 py-1 rounded text-xs  text-white bg-blue-600 hover:bg-blue-700 transition">
                                    Update
                                </a>

                                {{-- 🗑️ Delete --}}
                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Are you sure you want to delete this order?')"
                                        class="px-2 py-1 rounded text-xs text-white bg-red-600 hover:bg-red-700 transition">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $orders->links('vendor.pagination.custom') }}
    </div>
@endsection
