@extends('backend.app')
@section('title', 'Subcategory - ' . $subcategory->name)

@section('content')
<div class="max-w-2xl mx-auto mt-20 p-6 bg-white rounded-lg shadow-md border border-gray-100">

  <h2 class="text-3xl font-bold text-gray-800 mb-6 flex items-center gap-2">
    <span class="material-symbols-outlined text-blue-500">folder</span>
    Subcategory Details
  </h2>

  <div class="mb-4">
    <p class="text-sm text-gray-500">Subcategory ID</p>
    <p class="text-lg font-medium text-gray-800">{{ $subcategory->id }}</p>
  </div>

  <div class="mb-4">
    <p class="text-sm text-gray-500">Name</p>
    <p class="text-lg font-medium text-gray-800">{{ $subcategory->name }}</p>
  </div>

  <div class="mb-4">
    <p class="text-sm text-gray-500">Parent Category</p>
    <p class="text-lg font-medium text-gray-800">{{ $subcategory->category->name ?? '—' }}</p>
  </div>

  <div class="mb-4">
    <p class="text-sm text-gray-500">Subcategory Image</p>
    @if ($subcategory->image)
      <img src="{{ asset('storage/' . $subcategory->image) }}"
        alt="{{ $subcategory->name }}"
        class="w-48 h-48 object-cover rounded-lg shadow-md mt-2">
    @else
      <p class="text-lg font-medium text-gray-800">No Image Available</p>
    @endif
  </div>

  <div class="flex flex-wrap gap-3">
    <a href="{{ route('subcategories.index') }}"
      class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white text-sm font-medium rounded-md">
      <span class="material-symbols-outlined text-sm mr-1">arrow_back</span>
      Back
    </a>

    <a href="{{ route('subcategories.edit', $subcategory->slug) }}"
      class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md">
      <span class="material-symbols-outlined text-sm mr-1">edit</span>
      Edit
    </a>

    <form action="{{ route('subcategories.destroy', $subcategory->slug) }}" method="POST"
      onsubmit="return confirm('Are you sure you want to delete this subcategory?');">
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
