@extends('backend.app')
@section('title', 'All Category')

@section('content')
      <!-- Header and Add Button -->
      <div class="flex items-center justify-between flex-wrap gap-4">
        <h2 class="text-2xl font-semibold flex items-center">
          Categories
          <span class="inline-flex items-center justify-center w-6 h-6 ml-2 text-xs font-bold text-white bg-green-600 rounded-full">
            {{ $categories->total() }}
          </span>
        </h2>
        <a href="{{ route('categories.create') }}"
         class="text-white px-3 py-2 text-sm rounded-md bg-green-600 hover:bg-green-700 inline-flex items-center">
          <span class="material-symbols-outlined text-base mr-1">add</span>
          Add Category
        </a>
      </div>

      <!-- Responsive Table -->
     <div class="mt-6 overflow-x-auto">
    <div class="mt-6 overflow-x-auto">
    <table class="min-w-full table-auto border border-gray-200 text-center text-sm">
      <thead class="bg-gray-100 text-gray-600 font-medium">
        <tr>
          <th class="px-4 py-2 border">Serial</th>
          <th class="px-4 py-2 border">Name</th>
          <th class="px-4 py-2 border">Image</th>
          <th class="px-4 py-2 border">Product Count</th>
          <th class="px-4 py-2 border">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $key => $category)
            <tr class="hover:bg-gray-50">
                <td class="px-4 py-2 border">{{ $categories->firstItem() + $key }}</td>
                <td class="px-4 py-2 border">{{ $category->name }}</td>
                <td class="px-4 py-2 border">
                    @if ($category->image)
                        @php
                            $imageUrl = Str::startsWith($category->image, 'categories/')
                                ? asset('storage/' . $category->image)
                                : asset($category->image);
                        @endphp
                        <img src="{{ $imageUrl }}" alt="{{ $category->name }}" class="w-16 h-16 object-cover mx-auto rounded-md">
                    @else
                        <span class="text-gray-500">No Image</span>
                    @endif
                </td>
                <td class="px-4 py-2 border">
                <a href="{{ route('products.filterByCategory', ['categoryName' => $category->name]) }}"
                    class="inline-flex items-center gap-2 text-sm font-medium text-white bg-cyan-600 hover:bg-cyan-700 px-3 py-1.5 rounded-full shadow-sm transition">
                    View {{ $category->name }}
                    <span class="bg-white text-cyan-700 text-xs font-bold px-2 py-0.5 rounded-full">
                        {{ $category->products_count }}
                    </span>
                </a>
                </td>
                  <td class="px-4 py-2 border">
                    <div class="flex flex-wrap justify-center gap-2">
                      <a href="{{ route('categories.show', $category->slug) }}"
                       class="text-white px-2 py-1 rounded bg-indigo-600 hover:bg-indigo-700 text-xs">
                        Show
                      </a>
                      <a href="{{ route('categories.edit', $category->slug) }}"
                       class="text-white px-2 py-1 rounded bg-sky-600 hover:bg-sky-700 text-xs">
                        Edit
                      </a>
                      <form action="{{ route('categories.destroy', $category->slug) }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit"
                            onclick="return confirm('Are you sure you want to delete this category?')"
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
      </div>

      </div>


      <!-- Pagination -->
      <div class="mt-6">
        {{ $categories->links('vendor.pagination.custom') }}
      </div>
@endsection
