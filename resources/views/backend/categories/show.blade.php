@extends('backend.app')
@section('title', 'Category - ' . $category->name)



@section('content')
<div class="max-w-2xl mx-auto mt-20 p-6 bg-white rounded-lg shadow-md border border-gray-100">

  <h2 class="text-3xl font-bold text-gray-800 mb-6 flex items-center gap-2">
    <span class="material-symbols-outlined text-blue-500">folder</span>
    Category Details
  </h2>

  <div class="mb-4">
    <p class="text-sm text-gray-500">Category ID</p>
    <p class="text-lg font-medium text-gray-800">{{ $category->id }}</p>
  </div>

  <div class="mb-4">
    <p class="text-sm text-gray-500">Name</p>
    <p class="text-lg font-medium text-gray-800">{{ $category->name }}</p>
  </div>

  {{-- Image Display Section --}}
  <div class="mb-4">
    <p class="text-sm text-gray-500">Category Image</p>
    @if ($category->image)
        @php
            $imageUrl = Str::startsWith($category->image, 'categories/')
                ? asset('storage/' . $category->image)
                : asset($category->image);
        @endphp
        <img src="{{ $imageUrl }}" alt="{{ $category->name }}" class="w-48 h-48 object-cover rounded-lg shadow-md mt-2">
    @else
        <p class="text-lg font-medium text-gray-800">No Image Available</p>
    @endif
  </div>
  {{-- End Image Display Section --}}

  <div class="mb-6">
 <a href="{{ route('products.filterByCategory', ['categoryName' => $category->name]) }}" class="block">
    <div class="bg-gray-50 hover:bg-gray-100 transition rounded-md py-4 px-5 border border-gray-200 flex justify-between items-center">
        <span class="text-sm text-gray-700">
            View all Products under <strong>{{ $category->name }}</strong>
        </span>
        <span class="text-xs bg-blue-600 text-white px-2 py-1 rounded-full">
            Products: {{ $category->products_count }}
        </span>
    </div>
</a>

  </div>

  <div class="flex flex-wrap gap-3">
    <a href="{{ route('dashboard') }}"
     class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white text-sm font-medium rounded-md">
      <span class="material-symbols-outlined text-sm mr-1">arrow_back</span>
      Back
    </a>

    <a href="{{ route('categories.edit', $category->slug) }}"
     class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md">
      <span class="material-symbols-outlined text-sm mr-1">edit</span>
      Edit
    </a>

    <form action="{{ route('categories.destroy', $category->slug) }}" method="POST"
      onsubmit="return confirm('Are you sure you want to delete this category?');">
      @csrf
      @method('DELETE')
      <button type="submit"
          class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-md">
        <span class="material-symbols-outlined text-sm mr-1">delete</span>
        Delete
      </button>
    </form>
  </div>
</div>

@endsection
