@extends('backend.app')
@section('title', 'Create Category')

@section('content')
<!-- resources/views/admin/orders/index.blade.php -->

<div class="bg-gray-100 p-10">
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-6">All Orders</h1>

        <div class="bg-white shadow-md rounded overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <tr>
                        <th class="py-3 px-6 text-left">Name</th>
                        <th class="py-3 px-6 text-left">Phone</th>
                        <th class="py-3 px-6 text-left">Product</th>
                        <th class="py-3 px-6 text-left">Ordered At</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm">
                    @foreach($orders as $order)
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="py-3 px-6">{{ $order->name }}</td>
                            <td class="py-3 px-6">{{ $order->phone }}</td>
                            <td class="py-3 px-6">{{ $order->product }}</td>
                            <td class="py-3 px-6">{{ $order->created_at->format('Y-m-d H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection







