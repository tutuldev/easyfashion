@extends('backend.app')
@section('title', 'Product - ' . $product->name)

@section('content')
<div class="mx-auto w-full max-w-screen-2xl">
    <main class="flex-1 mx-auto mt-24 text-gray-800 px-2 sm:px-5">
        <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-8 ">{{ $product->name }}</h1>

        <section class="bg-gray-50 border border-gray-200 p-6 rounded-xl mb-12 shadow-sm">
            <h2 class="text-xl font-semibold mb-4 text-gray-700">Product Details</h2>
            <ul class="space-y-2 text-gray-600">
                <li><strong>💰 Price:</strong> ৳{{ number_format($product->price, 2) }}</li>
                <li><strong>📂 Category:</strong> {{ $product->category->name ?? 'No Category' }}</li>
            </ul>
        </section>

        @if(!empty($product->description))
        <section class="mb-12 bg-white border border-gray-200 rounded-xl shadow-sm p-6">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">📄 Description</h2>
            <div class="prose prose-slate max-w-none text-gray-800 leading-relaxed">
                {!! $product->description !!}
            </div>
        </section>
        @endif

        @if (!empty($product->images))
            <section class="mb-20">
                <h2 class="text-2xl font-semibold mb-6 text-gray-700">Product Images</h2>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach ($product->images as $img)
                                @php
                                $imgUrl = Str::startsWith($img, 'products/')
                                    ? asset('storage/' . $img)
                                    : asset($img);
                                 @endphp
                        <div class="relative rounded-xl overflow-hidden border border-gray-200 shadow-sm bg-white group">
                            <img src="{{ asset($imgUrl) }}" alt="Product Image"
                                class="w-full h-48 object-cover">
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

        <div class="flex flex-wrap gap-3">
            <a href="{{ route('products.index') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white text-sm font-medium rounded-md">
                <span class="material-symbols-outlined text-sm mr-1">arrow_back</span>
                Back to Products
            </a>

            <a href="{{ route('products.edit', $product->slug) }}"
                class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md">
                <span class="material-symbols-outlined text-sm mr-1">edit</span>
                Edit
            </a>

            <form action="{{ route('products.destroy', $product->slug) }}" method="POST"
                onsubmit="return confirm('Are you sure you want to delete this product?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-md">
                    <span class="material-symbols-outlined text-sm mr-1">delete</span>
                    Delete
                </button>
            </form>
        </div>
    </main>
</div>
@endsection

{{-- All JavaScript has been removed from here --}}
