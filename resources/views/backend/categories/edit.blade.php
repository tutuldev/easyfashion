@extends('backend.app')
@section('title', 'Edit - ' . $category->name)


@section('content')
<div class="max-w-xl mx-auto mt-20 bg-white p-6 rounded-lg shadow-md border border-gray-100">


    <h2 class="text-2xl font-bold text-gray-800 flex items-center gap-2 mb-6">
      <span class="material-symbols-outlined text-blue-500">edit</span>
      Edit Category
    </h2>
   

  <form action="{{ route('categories.update', $category->slug) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-4">
      <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Category Name</label>
      <input type="text" id="name" name="name"
         value="{{ old('name', $category->name) }}"
         class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
      @error('name')
      <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
      @enderror
    </div>

    <button type="submit"
        class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition duration-200 font-medium">
      Update Category
    </button>
  </form>
</div>
@endsection
