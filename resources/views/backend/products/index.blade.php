@extends('backend.app')
@section('title', 'All Products')

@section('content')

<div class="flex items-center justify-between flex-wrap gap-4 mb-6">
    <h2 class="text-2xl font-semibold flex items-center">
        Products
        <span class="inline-flex items-center justify-center w-6 h-6 ml-2 text-xs font-bold text-white bg-green-600  rounded-full">
            {{ $products->total() }}
        </span>
    </h2>
    <a href="{{ route('products.create') }}"
       class="text-white px-3 py-2 text-sm rounded-md bg-green-600 hover:bg-green-700 inline-flex items-center">
        <span class="material-symbols-outlined text-base mr-1">add</span>
        Add Product
    </a>
</div>

<div class="overflow-x-auto bg-white shadow-sm rounded-lg">
    <table class="min-w-full table-auto border-collapse text-center text-sm">
        <thead class="bg-gray-100 text-gray-600 font-medium">
            <tr>
                <th class="px-4 py-2 border border-gray-200">Serial</th>
                <th class="px-4 py-2 border border-gray-200 ">Image(s)</th>
                <th class="px-4 py-2 border border-gray-200 text-left">Name</th>
                <th class="px-4 py-2 border border-gray-200">Category</th>
                <th class="px-4 py-2 border border-gray-200">Price</th>
                <th class="px-4 py-2 border border-gray-200">Created At</th>
                <th class="px-4 py-2 border border-gray-200">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $key => $product)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border border-gray-200">{{ $products->firstItem() + $key }}</td>
                    <td class="px-4 py-2 border border-gray-200">
                        @if (!empty($product->images) && is_array($product->images) && count($product->images) > 0)
                            <div class="flex flex-wrap gap-1 justify-center">

                                @foreach (array_slice($product->images, 0, 3) as $img)
                                  @php
                                $imgUrl = Str::startsWith($img, 'products/')
                                    ? asset('storage/' . $img)
                                    : asset($img);
                                 @endphp
                                    <img src="{{ asset($imgUrl) }}" alt="Image"
                                         class="w-10 h-10 object-cover rounded border border-gray-300">
                                @endforeach
                                @if (count($product->images) > 3)
                                    <span class="w-10 h-10 flex items-center justify-center text-xs bg-gray-200 rounded border border-gray-300">
                                        +{{ count($product->images) - 3 }}
                                    </span>
                                @endif
                            </div>
                        @else
                            <div class="w-16 h-16 mx-auto flex items-center justify-center bg-gray-50 text-sm text-gray-500 italic border border-dashed border-gray-400 rounded">
                                No Image
                            </div>
                        @endif
                    </td>
                    <td class="px-4 py-2 border border-gray-200 text-left whitespace-normal break-words max-w-xs">
                        {{ $product->name }}
                    </td>
                    <td class="px-4 py-2 border border-gray-200">{{ $product->category->name ?? 'Uncategorized' }}</td>
                    <td class="px-4 py-2 border border-gray-200">৳{{ number_format($product->price, 2) }}</td>
                    <td class="px-4 py-2 border border-gray-200">{{ $product->created_at->format('Y-m-d') }}</td>
                    <td class="px-4 py-2 border border-gray-200">
                        <div class="flex flex-col sm:flex-row justify-center items-center gap-1">
                            <a href="{{ route('products.show', $product->slug) }}"
                               class="text-white px-2 py-1 rounded bg-indigo-600 hover:bg-indigo-700 text-xs w-full sm:w-auto text-center">
                                Show
                            </a>
                            <a href="{{ route('products.edit', $product->slug) }}"
                               class="text-white px-2 py-1 rounded bg-sky-600 hover:bg-sky-700 text-xs w-full sm:w-auto text-center">
                                Edit
                            </a>
                            <form action="{{ route('products.destroy', $product->slug) }}" method="POST" class="w-full sm:w-auto">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Are you sure you want to delete this product?')"
                                        class="text-white px-2 py-1 rounded bg-red-600 hover:bg-red-700 text-xs w-full sm:w-auto">
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

<div class="mt-6">
    {{ $products->links('vendor.pagination.custom') }}
</div>

@endsection
