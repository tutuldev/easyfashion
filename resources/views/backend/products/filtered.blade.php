@extends('backend.app')
@section('title', $title . ' Category') {{-- Dynamic title for the filtered page --}}

@section('content')
    <!-- Header and Add Button (Modified for Product Filter) -->
    <div class="flex items-center justify-between flex-wrap gap-4">
        <h2 class="text-2xl font-semibold flex items-center">
            Products in "{{ $title }}" Category
            <span class="inline-flex items-center justify-center w-6 h-6 ml-2 text-xs font-bold text-white bg-green-600  rounded-full">
                {{ $products->total() }} {{-- Show total products in this category --}}
            </span>
        </h2>
        {{-- If you want to link back to the main product index, you can add a button here --}}
        <a href="{{ route('products.index') }}"
           class="text-white px-3 py-2 text-sm rounded-md bg-blue-600 hover:bg-blue-700 inline-flex items-center">
            <span class="material-symbols-outlined text-base mr-1">list</span>
            View All Products
        </a>
    </div>

    <!-- Responsive Table -->
    <div class="mt-6 overflow-x-auto">
        @if ($products->isEmpty())
            <p class="text-center py-4 text-gray-600">No products found in this category.</p>
        @else
            <table class="min-w-full table-auto border border-gray-200 text-center text-sm">
                <thead class="bg-gray-100 text-gray-600 font-medium">
                    <tr>
                        <th class="px-4 py-2 border">Serial</th>
                        <th class="px-4 py-2 border">Image</th> {{-- Added for product image --}}
                        <th class="px-4 py-2 border">Name</th>
                        <th class="px-4 py-2 border">Price</th>
                        <th class="px-4 py-2 border">Category</th> {{-- Changed from Product Count --}}
                        <th class="px-4 py-2 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $key => $product)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border">{{ $products->firstItem() + $key }}</td>
                            <td class="px-4 py-2 border">
                                    @if (!empty($product->images) && is_array($product->images) && count($product->images) > 0)
                                        <div class="flex flex-wrap gap-1 justify-center">
                                            @foreach (array_slice($product->images, 0, 3) as $img)
                                              @php
                                                $imgUrl = Str::startsWith($img, 'products/')
                                                    ? asset('storage/' . $img)
                                                    : asset($img);
                                                @endphp
                                                <img src="{{ asset($imgUrl) }}" alt="Image" class="w-10 h-10 object-cover rounded border border-gray-300">
                                            @endforeach
                                            @if (count($product->images) > 3)
                                                <span class="w-10 h-10 flex items-center justify-center text-xs bg-gray-200 rounded border border-gray-300">
                                                    +{{ count($product->images) - 3 }}
                                                </span>
                                            @endif
                                        </div>
                                    @else
                                        <div
                                            class="w-16 h-16 mx-auto flex items-center justify-center bg-gray-50 text-sm text-gray-500 italic border border-dashed border-gray-400 rounded">
                                            No Image
                                        </div>


                                    @endif
                            </td>
                            <td class="px-4 py-2 border">{{ $product->name }}</td>
                            <td class="px-4 py-2 border">BDT {{ number_format($product->price, 2) }}</td>
                            <td class="px-4 py-2 border">
                                {{ $product->category->name ?? 'N/A' }} {{-- Display category name --}}
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex flex-wrap justify-center gap-2">
                                    <a href="{{ route('products.show', $product->slug) }}"
                                       class="text-white px-2 py-1 rounded bg-indigo-600 hover:bg-indigo-700 text-xs">
                                        Show
                                    </a>
                                    <a href="{{ route('products.edit', $product->slug) }}"
                                       class="text-white px-2 py-1 rounded bg-sky-600 hover:bg-sky-700 text-xs">
                                        Edit
                                    </a>
                                    <form action="{{ route('products.destroy', $product->slug) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit"
                                                onclick="return confirm('Are you sure you want to delete this product?')"
                                                class="text-white px-2 py-1 rounded bg-red-600 hover:bg-red-700 text-xs">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $products->links('vendor.pagination.custom') }} {{-- Ensure this custom pagination view exists --}}
    </div>
@endsection
