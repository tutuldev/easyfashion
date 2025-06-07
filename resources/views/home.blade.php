
@extends('frontend.app')
@section('title', 'Home')
@section('content')
 {{-- banner  --}}
    @include('frontend.layouts.banner')
    @include('frontend.layouts.tranding')
    @include('frontend.layouts.polo-collections')
    @include('frontend.layouts.product-category')
    @include('frontend.layouts.jins')
    @include('frontend.layouts.social')
    @include('frontend.layouts.video')
    @include('frontend.layouts.justin')
    @include('frontend.layouts.process')
    @include('frontend.layouts.followus')

<!-- resources/views/order/create.blade.php -->


<div class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Place Your Order</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ url('/order') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-gray-700">Your Name</label>
                <input type="text" name="name" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label class="block text-gray-700">Phone Number</label>
                <input type="text" name="phone" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label class="block text-gray-700">Product Name</label>
                <input type="text" name="product" required class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                Submit Order
            </button>
        </form>
    </div>
</div>


@endsection
